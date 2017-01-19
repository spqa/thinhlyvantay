<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded=[];

    public function marks(){
        return $this->hasMany(Mark::class);
    }
}
