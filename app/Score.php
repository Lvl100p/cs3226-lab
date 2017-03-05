<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{

    protected $appends = [
        'spe',
        'dil',
        'sum'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getSpeAttribute(){
        return $this->mc + $this->tc;
    }

    public function getDilAttribute(){
        return $this->hw + $this->bs + $this->ks + $this->ac;
    }

    public function getSumAttribute(){
        return $this->mc + $this->tc + $this->hw + $this->bs + $this->ks + $this->ac;
    }
}
