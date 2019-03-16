@extends('layouts.master')

@section('title')
    Welcome
@endsection

@section('content')
    <div class="row">
        <div class="col-xl">
            <h1>create new Encuesta</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <form  method="post" class="form-control" action="/encuestas">
                {{csrf_field()}}

                <input type="text" class="{{$errors->has('name')? 'alert-danger':''}}" name="name" placeholder="Nombre de la Encuesta" value="{{old('name')}}">


                <button type="submit" class="btn-primary ">Create Encuesta</button>

                @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach($errors ->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
@endsection