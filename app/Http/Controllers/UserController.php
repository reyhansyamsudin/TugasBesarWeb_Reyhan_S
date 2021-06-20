<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
class UserController extends Controller
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

    public function log_out_admin(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

    public function log_out_customer(Request $request)
    {
        Auth::logout();
        return redirect('homepage');
    }

    public function indexAdmin()
    {
        $users = User::where('role','admin')->get();
        Session::put('menu','user_admin');
        return view('dashboard.index_admin',compact('users'));
    }

    public function createAdmin(Request $request)
    {
        $User = new User;
        $User->role = 'admin';
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        if($request->contact_person=='on')
        {
            $data = User::where('contact_person','yes')->first();
            $ganti = User::find($data->id);
            $ganti->contact_person =NULL;
            $ganti->save();
            $User->contact_person = 'yes';
        }
        $User->password = bcrypt($request->password);
        $User->save();
        return redirect('users')
        ->with('success','New data User admin successfully added!');
    }

    public function updateAdmin(Request $request,$id)
    {
        $User = User::find($id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        if($request->contact_person=='on')
        {
            $data = User::where('contact_person','yes')->first();
            $ganti = User::find($data->id);
            $ganti->contact_person =NULL;
            $ganti->save();
            $User->contact_person = 'yes';
        }
        $User->password = bcrypt($request->password);
        $User->save();
         return redirect('users')
        ->with('success','New data User admin successfully updated!');
    }

    public function deleteAdmin($id)
    {
        User::find($id)->delete();
          return redirect('users')
        ->with('success','New data User admin successfully deleted!');
    }

     public function indexCustomer()
    {
        $users = User::where('role','customer')->get();
        Session::put('menu','user_customer');
        return view('dashboard.index_customer',compact('users'));
    }

    public function createCustomer(Request $request)
    {
        $User = new User;
        $User->role = 'customer';
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        $User->address = $request->address;
        $User->password = bcrypt($request->password);
        $User->save();
        return redirect('customers')
        ->with('success','New data User customer successfully added!');
    }

    public function updateCustomer(Request $request,$id)
    {
        $User = User::find($id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        $User->address = $request->address;
        $User->password = bcrypt($request->password);
        $User->save();
         return redirect('customers')
        ->with('success','New data User customer successfully updated!');
    }

    public function deleteCustomer($id)
    {
        User::find($id)->delete();
          return redirect('customers')
        ->with('success','New data User customer successfully deleted!');
    }
}
