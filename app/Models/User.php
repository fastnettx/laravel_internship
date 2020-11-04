<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $ADMINROLE = 1;
    use HasApiTokens, HasFactory, Notifiable;

//    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'phone' => '+38',
        'address' => 'Ukraine ',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Orders');
    }

    public function basket()
    {
        return $this->hasMany('App\Models\Basket');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkTheAdmin()
    {
        return $this->role === 1;

    }

    public function setAssignRoleAttribute()
    {
        $this->attributes['role'] = $this->ADMINROLE;
    }

}
