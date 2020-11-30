<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'lead_source_id',
        'owner',
        'first_name',
        'last_name',
        'title',
        'email',
        'department',
        'phone',
        'home_phone',
        'other_phone',
        'fax',
        'mobile',
        'date_of_birth',
        'assistant',
        'assistant_phone',
    ];
}
