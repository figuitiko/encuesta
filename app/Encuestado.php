<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestado extends Model
{
    protected $guarded=[];

    function encuesta(){
        return $this->belongsTo(Encuesta::class);
    }
}
