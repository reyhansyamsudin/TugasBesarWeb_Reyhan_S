<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Vendor;
use Session;
class CarController extends Controller
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
            $tmp_file_path = "admin/images/cars/";
            $file->move($tmp_file_path,$tmp_file_name);
            // if(move_uploaded_file($tmp_name, $tmp_file_path)){
            $result = url('admin/images/cars').'/'.$tmp_file_name;
            // }
        return $result;
    }
    
    public function index()
    {
        $cars = Car::with('vendor')->get();
        $vendors = Vendor::all();
        Session::put('menu','cars');
        return view('dashboard.cars',compact('cars','vendors'));
    }

    public function create(Request $request)
    {
        $img_car = 'img_car';
        $car = new Car;
        $car->name_car = $request->name_car;
        $car->type_car = $request->type_car;
        $car->doors = $request->doors;
        $car->seats = $request->seats;
        $car->vendor_id = $request->vendor_id;
        $car->img_car = $this->uploadFile($request,$img_car);
        $car->day_price = $request->day_price;
        $car->fine = $request->fine;
        $car->save();
         return redirect('cars')
         ->with('success','Data car successfully added!');
    }

    public function update(Request $request,$id)
    {
        $img_car_file = $request->file('img_car');
        $img_car = 'img_car';
        $car = Car::find($id);
        $car->name_car = $request->name_car;
        $car->type_car = $request->type_car;
        $car->vendor_id = $request->vendor_id;
        $car->doors = $request->doors;
        $car->seats = $request->seats;
        if($img_car_file!=null)
        {
            $car->img_car = $this->uploadFile($request,$img_car);
        }else
        {
            $car->img_car = $request->old_img_car;
        }
        $car->day_price = $request->day_price;
        $car->fine = $request->fine;
        $car->save();
         return redirect('cars')
         ->with('success','Data car successfully updated!');
    }

    public function delete($id)
    {
        Car::find($id)->delete();
         return redirect('cars')
         ->with('success','Data car successfully deleted!');
    }

    
}
