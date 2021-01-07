<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Account extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'industry',
        'owner',
        'no_employee',
        'annual_revenue',
        'phone'
    ];

    public function getIdAttribute()
    {
        return Crypt::encryptString($this->attributes['id']);
    }
}
