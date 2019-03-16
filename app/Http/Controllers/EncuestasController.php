<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Pregunta;
use App\Respuesta;
use App\EncuestaType;
use Illuminate\Http\Request;
use Validator;

class EncuestasController extends Controller
{
    public function index(){
        /*$projects = Project::all();*/
        $encuestas= Encuesta::all();
        $types= EncuestaType::all();


        return view('encuestas.index', ['encuestas'=>$encuestas,'types'=>$types]);
    }
    public function create(){
       $tipo=request('type');
       $types=EncuestaType::all();
       $type=$types->where('name',$tipo);

        $id_type=$type[0]->id;

        $preguntas = Pregunta::all();
        $preguntas_type=$preguntas->where('encuestaType_id',$id_type);
        $respuestas= Respuesta::all();
        $respuestas_type= $respuestas->where('encuestaType_id',$id_type);





        return view('encuestas.create', compact('preguntas_type','respuestas_type'));
    }
    public function show(Encuesta $encuesta){

        return view('encuestas.show', compact('encuesta'));
    }
    public function store(){
        dd(request(['type','name']));

        $attributes= request()->validate([
            'name'=>['required', 'min:3']
        ]);




        Encuesta::create($attributes);

        /*$encuesta = new Encuesta();
        $encuesta->name=request('name');
        $encuesta->save();*/



        return redirect('/encuestas');
    }
    public function getValues(){
        $request=request();

        return $request;

    }


}
