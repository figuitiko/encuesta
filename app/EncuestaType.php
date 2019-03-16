<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaType extends Model
{
    protected $guarded=[];

    public function encuestas(){
        return $this->hasMany(Encuesta::class);
    }

}
