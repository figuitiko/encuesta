<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $guarded=[];

    public function respuestas(){
         return $this->belongsToMany(Respuesta::class)->withTimestamps();
    }
    public function encuestas()
    {
        return $this->belongsToMany(Encuesta::class)->withTimestamps();
    }
    Public function encuestaType(){
        return $this->belongsTo(EncuestaType::class);
    }

}
