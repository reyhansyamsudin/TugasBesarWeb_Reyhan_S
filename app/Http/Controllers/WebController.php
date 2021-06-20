<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use Session;
use DB;
use Auth;
class WebController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $cars = Car::with('vendor')->paginate(6);
        return view('web.index',compact('cars'));
        //return $cars;
    }

    public function searchCar(Request $request)
    {
        if($request->search!=NULL)
        {
            $cars = DB::table('cars as ca')
            ->join('vendors as vd','vd.id','=','ca.vendor_id')
            ->where('ca.name_car',$request->search)
            ->Orwhere('vd.name_vendor',$request->search)
            ->paginate(6);
            return view('web.result',compact('cars'));
        }else
        {
            $cars = Car::with('vendor')->paginate(6);
            return view('web.index',compact('cars'));
        }
    }

    public function registCustomer(Request $request)
    {
        $User = new User;
        $User->role = 'customer';
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        $User->address = $request->address;
        $User->password = bcrypt($request->password);
        $User->save();
        $login = User::where('id',$User->id)->first();
        Auth::login($login);
        return redirect('homepage');
    }

    public function rentalCar($id)
    {
        if(Auth::check())
        {
            $cars = Car::find($id);
            return view('web.rental',compact('cars'));
            //return $cars;
        }else
        {
             return redirect('login')
        ->with('success','You must logged in first or register if not have account!');
        }
    }

}
