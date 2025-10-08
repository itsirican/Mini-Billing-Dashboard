<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'picture'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function getPictureAttribute($value) {
        return $value??'customer/profile.png';
    }
}