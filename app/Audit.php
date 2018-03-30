<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $fillable = [
        'ip_address', 'action', 'details','user_id'
    ];

}
