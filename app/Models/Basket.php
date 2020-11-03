<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity', 'price', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

//    public function setPriceCountAttribute($value)
//    {
//        $this->attributes['price'] = 100 * $value;
//    }
}
