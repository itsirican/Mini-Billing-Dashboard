<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'picture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Accessor for picture URL
    public function getPictureAttribute($value) {
        return $value??'customer/profile.png';
    }
}