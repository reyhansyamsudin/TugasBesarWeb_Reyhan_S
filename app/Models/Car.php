<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;
use App\Models\Transaction;
class Car extends Model
{
    use HasFactory;

    public function vendor()
    {
    	return $this->belongsTo(Vendor::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
