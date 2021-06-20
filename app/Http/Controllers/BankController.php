<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use Session;
class BankController extends Controller
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
        $banks = Bank::all();
        Session::put('menu','banks');
        return view('dashboard.banks',compact('banks'));
    }

    public function create(Request $request)
    {
        $Bank = new Bank;
        $Bank->name_Bank = $request->name_bank;
        $Bank->no_rek = $request->no_rek;
        $Bank->an = $request->an;
        $Bank->save();
        return redirect('banks')
        ->with('success','New data Bank successfully added!');
    }

    public function update(Request $request,$id)
    {
        $Bank = Bank::find($id);
        $Bank->name_Bank = $request->name_bank;
        $Bank->no_rek = $request->no_rek;
        $Bank->an = $request->an;
        $Bank->save();
        return redirect('banks')
        ->with('success','Data Bank successfully updated!');
    }

    public function delete($id)
    {
        Bank::find($id)->delete();
         return redirect('banks')
         ->with('success','Data Bank successfully deleted!');
    }
}
