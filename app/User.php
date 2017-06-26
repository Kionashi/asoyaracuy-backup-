<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'balance', 'email', 'house', 'phone', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function findByHouse($name){

        $house = User::Where('house',$name);

        return $house;
    }

    public static function getDebtors(){

        $debtorsCount = User::Where('balance', '<', 0)->count();

        return $debtorsCount;
    }







}
