<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
class Transaction extends Model
{
    use HasFactory;

    public function car()
    {
    	return $this->belongsTo(Car::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function checkRental($id)
    {
    	$now =  Carbon::now()->format('Y-m-d');
    	$valid = DB::table('transactions')
    	->where('car_id',$id)
    	->where('status_transaction','agree')
    	->where('status_car','leased')
    	->where('return_date','>=',$now)
    	->get();
    	return $valid;
    }

    public function rangeDay($start,$end)
    {
        $lease = Carbon::parse($start)->addDays(1);
        $period = CarbonPeriod::create($lease, $end);
        return count($period);
    }

    public function fineCheck($start,$end,$id)
    {
        $lease = Carbon::parse($start)->addDays(1);
        $period = CarbonPeriod::create($lease, $end);
        $cc = count($period);
        $data = DB::table('cars')->where('id',$id)->first();
        $fine = $cc * $data->fine;
        return number_format($fine);
    }
}
