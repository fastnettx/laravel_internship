<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends Model implements HasMedia
{
    use  InteractsWithMedia;

    protected $fillable = ['name','content'];

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
