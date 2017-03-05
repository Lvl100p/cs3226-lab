<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nickname',
        'name',
        'flag',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function scores(){
        return $this->hasMany('App\Score');
    }

    public function achievements(){
        return $this->belongsToMany('App\Achievement', 'earned', 'student_id', 'achievement_id');
}
    public function message()
    {
        return $this->hasOne(Message::class);

    }
}
