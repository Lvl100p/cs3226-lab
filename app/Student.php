<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'rank',
        'nickname',
        'name',
        'flag',
        'mc',
        'tc',
        'spe',
        'hw',
        'bs',
        'ks',
        'ac',
        'dil',
        'sum',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
