<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'name', 'parent_id',
    ];

    public function subcategory()
    {

        return $this->hasMany('App\Models\Categorie', 'parent_id');

    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_category', 'category_id', 'product_id');

    }
}
