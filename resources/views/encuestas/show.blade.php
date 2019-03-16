@extends('layouts.master')

@section('title')
    Welcome
@endsection

@section('content')


    <h1>{{$encuesta->name}}</h1>
    <div class="row">
        <div class="col-xl-12">
            {{$encuesta->created_at}}
        </div>
        <div class="col-xl-12">
            <a href="/projects/{{$encuesta->id}}/edit">Edit</a>
        </div>
        <div class="col-xs-12">
            @if ($encuesta->preguntas->count())
                <div class="col-xs-12">
                    <ul>
                        @foreach($encuesta->preguntas as $pregunta)
                            <li>{{$pregunta->description}}</li>
                              @if($pregunta->respuestas->count())
                                  <ul>
                            @foreach($pregunta->respuestas as $respuesta)
                                   @if ($respuesta->es_correcta)      <li>{{$respuesta->description}}</li> @endif
                            @endforeach
                            @endif
                                  </ul>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection