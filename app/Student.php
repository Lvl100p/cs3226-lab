<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
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
        'sum'
    ];
}
