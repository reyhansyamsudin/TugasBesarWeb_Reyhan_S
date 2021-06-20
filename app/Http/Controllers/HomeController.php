<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
class HomeController extends Controller
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
    public function index()
    {
        if(Auth::user()->role == 'admin')
        {
            Session::put('menu','home');
            $order = DB::table('transactions')->where('status_transaction','process')->count();
            $transaction = DB::table('transactions')->where('status_transaction','agree')->count();
            $customer = DB::table('users')->where('role','customer')->count();
            $admin = DB::table('users')->where('role','admin')->count();
            $vendor = DB::table('vendors')->count();
            $car = Db::table('cars')->count();
            $return_car = DB::table('transactions')->where('status_car','done')->count();
            $leased = DB::table('transactions')->where('status_car','leased')->count();
            return view('dashboard.home',compact('order','transaction','customer','admin','vendor','car','return_car'
                ,'leased'));
        }else
        {
            return redirect('homepage');
        }
    }
}
