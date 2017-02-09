<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded=[];
    public function marks(){
        return $this->hasMany(Mark::class);
    }

    public function classname(){
        return $this->belongsTo(Classname::class);
    }
}
