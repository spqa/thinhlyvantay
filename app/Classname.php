<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classname extends Model
{
    protected $guarded=[];

    public function students(){
        return $this->hasMany(Student::class);
    }
}
