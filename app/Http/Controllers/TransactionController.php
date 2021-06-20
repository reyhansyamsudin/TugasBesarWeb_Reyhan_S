<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Bank;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;
use PDF;
use Session;
class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];

            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "admin/images/transactions/";
            $file->move($tmp_file_path,$tmp_file_name);
            // if(move_uploaded_file($tmp_name, $tmp_file_path)){
            $result = url('admin/images/transactions').'/'.$tmp_file_name;
            // }
        return $result;
    }

    public function uploadFileKtp(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];

            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "admin/images/ktp/";
            $file->move($tmp_file_path,$tmp_file_name);
            // if(move_uploaded_file($tmp_name, $tmp_file_path)){
            $result = url('admin/images/ktp').'/'.$tmp_file_name;
            // }
        return $result;
    }

    public function index()
    {
        $transactions = Transaction::with('car','user')->get();
        //return $transactions;
        Session::put('menu','transactions');
        return view('dashboard.transactions',compact('transactions'));
    }

    public function createOnline(Request $request)
    {
        
        $img_ktp = 'img_ktp';
        $Transactions = new Transaction;
        $Transactions->code_transaction = strtoupper(Str::random(10));
        $Transactions->user_id = Auth::user()->id;
        $Transactions->car_id = $request->car_id;
        $Transactions->transaction_date = Carbon::now()->format('Y-m-d');
        $Transactions->lease_date = $request->lease_date;
        $Transactions->return_date = $request->return_date;
        $Transactions->amount = str_replace(',', '', $request->amount);
        $Transactions->type_transaction = 'online';
        $Transactions->img_ktp = $this->uploadFileKtp($request,$img_ktp);
        $Transactions->status_transaction ='process';
        $Transactions->where_go = $request->where_go;
        $Transactions->save();
        return redirect('transaction_order/'.Auth::user()->id);
    }

    public function OrderCar($id)
    {
       $data = Transaction::where('user_id',$id)->with('car','user')->get();
       //return $data;
       $banks = Bank::all();
       return view('web.orders',compact('data','banks'));
    }

    public function uploadBukti(Request $request,$id)
    {
        $img_transaction = 'img_transaction';
        $transactions = Transaction::find($id);
        $transactions->img_transaction = $this->uploadFile($request,$img_transaction);
        $transactions->save();
        return redirect()->back()
        ->with('success','Successfully upload proof of transaction!');
    }

    public function changeStatus($id,$status)
    {
        $transactions = Transaction::find($id);
        $transactions->status_transaction = $status;
        if($status=='agree')
        {
             $transactions->status_car ='leased' ;
        }
        $transactions->save();
        return redirect('transactions')
        ->with('success','Successfully '.$status.' this transaction!');
    }

    public function changeStatusDone($id)
    {
        $transactions = Transaction::find($id);
        $transactions->status_car ='done' ;
        $transactions->save();
        return redirect('transaction_return')
        ->with('success','Successfully done adn car back for this transaction!');
    }

    public function print_pdf_invoice($id)
    {
        $data = Transaction::where('id',$id)->with('car','user')->first();
        $lease = Carbon::parse($data->lease_date)->addDays(1);
        $period = CarbonPeriod::create($lease, $data->return_date);
        $pdf = PDF::loadview('web.invoice',compact('data','period'));
        return $pdf->download('invoice-'.$data->code_transaction.'.pdf');
        //return $pdf->stream();
        // return count($period);
    }

    public function indexReturn()
    {
        Session::put('menu','return');
        $now =  Carbon::now()->format('Y-m-d');
        $transactions = Transaction::with('car','user')->where('status_transaction','agree')->get();
        return view('dashboard.ReturnCars',compact('transactions','now'));
    }

    public function indexReport()
    {
        Session::put('menu','report');
        $now =  Carbon::now()->format('Y-m-d');
        return view('dashboard.report',compact('now'));
    }

    public function getReport(Request $request)
    {
        $transactions = Transaction::whereBetween('lease_date',[$request->start_lease_date,$request->end_lease_date])
        ->whereBetween('return_date',[$request->start_return_date,$request->end_return_date])
        ->with('car','user')
        ->get();
        if($request->pdf)
        {
            $now =  Carbon::now()->format('Y-m-d');
            $lease = $request->start_lease_date.' - '.$request->end_lease_date;
            $return = $request->start_return_date.' - '.$request->end_return_date;
            $pdf = PDF::loadview('dashboard.report_pdf',compact('transactions','lease','return','now'))->setPaper('legal', 'landscape');
            return $pdf->download('Report Lease date :'.$lease.' Return date :'.$return.'.pdf');
        }elseif($request->view)
        {
            $now =  Carbon::now()->format('Y-m-d');
            $lease = $request->start_lease_date.'-'.$request->end_lease_date;
            $return = $request->start_return_date.'-'.$request->end_return_date;
            $pdf = PDF::loadview('dashboard.report_pdf',compact('transactions','lease','return','now'))->setPaper('legal', 'landscape');
            return $pdf->stream();
        }
        //return $request;
    }
}
