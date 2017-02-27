<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded=[];
    protected $casts = [
        'birthDate' => 'date',
    ];

    public function marks(){
        return $this->hasMany(Mark::class);
    }

    public function classname(){
        return $this->belongsTo(Classname::class);
    }
}
