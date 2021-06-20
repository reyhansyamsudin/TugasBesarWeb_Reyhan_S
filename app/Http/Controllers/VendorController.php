<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Session;
class VendorController extends Controller
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
        $vendors = Vendor::all();
        Session::put('menu','vendors');
        return view('dashboard.vendors',compact('vendors'));
    }

    public function create(Request $request)
    {
        $Vendor = new Vendor;
        $Vendor->name_vendor = $request->name_vendor;
        $Vendor->save();
        return redirect('vendors')
        ->with('success','New data vendor successfully added!');
    }

    public function update(Request $request,$id)
    {
        $Vendor = Vendor::find($id);
        $Vendor->name_vendor = $request->name_vendor;
        $Vendor->save();
        return redirect('vendors')
        ->with('success','Data vendor successfully updated!');
    }

    public function delete($id)
    {
        Vendor::find($id)->delete();
         return redirect('vendors')
         ->with('success','Data vendor successfully deleted!');
    }
}
