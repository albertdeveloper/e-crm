<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = array();

    use HasFactory;

    public function noteable()
    {
        return $this->morphTo();
    }
}
