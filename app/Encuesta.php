<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $guarded=[];

    public function preguntas(){
        return $this->belongsToMany(Pregunta::class)->withTimestamps();
    }

    public function encuestado(){
        return $this->hasone(Encuestado::class);
    }
    public function encuestaType(){
        return $this->belongsTo(EncuestaType::class);
    }


}
