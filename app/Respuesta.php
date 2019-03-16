<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $guarded=[];

    public function preguntas()
    {
        return $this->belongsToMany(Pregunta::class)->withTimestamps();
    }
    Public function encuestaType(){
        return $this->belongsTo(EncuestaType::class);
    }

}
