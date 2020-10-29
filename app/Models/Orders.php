<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','status', 'address', 'payment_method_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
