<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'sku', 'brand_id', 'in_stock', 'price', 'description'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Categorie', 'product_category', 'product_id', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
