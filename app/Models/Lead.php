<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'company',
        'salutation',
        'first_name',
        'last_name',
        'title',
        'email',
        'phone',
        'fax',
        'mobile',
        'website',
        'industry',
        'no_employee',
        'street',
        'city',
        'state',
        'zip_code',
        'country',
        'lead_status_id',
        'lead_source_id'
    ];
}
