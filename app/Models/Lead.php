<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class Lead extends Model
{
    use HasFactory;

    protected $guarded = array();
    protected $fillable = [
        'user_id',
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
        'lead_source_id',
        'name',
    ];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->first_name .' '. $this->last_name;
    }


    public function leadStatus()
    {
        return $this->belongsTo('App\Models\LeadStatus','lead_status_id','id');
    }
    public function leadSource()
    {
        return $this->belongsTo('App\Models\LeadSource','lead_source_id','id');
    }
    public function defaultProfilePicture()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->first_name.''.$this->last_name) . '&color=7F9CF5&background=EBF4FF';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
