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
        'user_id',
        'salutation',
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

    protected $appends = [
        'name',
    ];

    public function getNameAttribute()
    {
        return $this->first_name .' '. $this->last_name;
    }



    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
