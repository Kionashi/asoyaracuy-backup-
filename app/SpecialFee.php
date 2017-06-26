<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialFee extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'status'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
