<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['invoice', 'product_id', 'customer_id', 'amount', 'tax', 'total'];

    public function customer()
    {
    	return $this->belongsTo('App\Models\Customer');
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }
}
