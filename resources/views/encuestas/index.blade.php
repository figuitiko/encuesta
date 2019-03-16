@extends('layouts.master')

@section('title')
    Welcome
@endsection

@section('content')


    <h1>Encuestas</h1>
    <ul>
  @foreach($encuestas as $encuesta)
            <a href="/encuestas/{{$encuesta->id}}">
                {{$encuesta->id}}
                {{$encuesta->name}}
                {{$encuesta->created_at}}
            </a>

  @endforeach
        <form method="get" action="encuestas/create">
      <select  id ="type" name="type">
          @foreach($types as  $type)

              <option  value="{{$type->name}}">{{$type->name}}</option>


          @endforeach
      </select>
            <button type="submit">Nueva encuesta</button>
        {{--<a href="/encuestas/create">create</a>--}}
        </form>
    </ul>
   {{-- <a href="/projects/create">new</a>--}}
@endsection