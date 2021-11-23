<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

   protected $fillable = ['title', 'category_id', 'deposit', 'price', ];

   public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }

    public function transaction()
    {
    	return $this->hasMany('App\Models\Transaction');
    }

}
