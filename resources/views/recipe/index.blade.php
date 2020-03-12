@extends('layouts.master')
@section('content')

        <div class="card-columns">
            @foreach( $recetas as $receta )

                <div class="card animated fadeIn slow mt-5">
                    <img src="{{$receta->image}}" class="card card-img-top mx-auto d-block img-thumbnail" alt="{{ $receta->name }}">

                    <div class="card-body">
                        <h4 class="card-title">{{ $receta->name }}</h4>
                        <p class="card-text">Tiempo: {{ $receta->time }} minutos</p>
                        <p class="card-text">Precio: {{ $receta->price }} </p>
                        <p class="card-text">
                            Dificultad:
                            <small class="text-muted"> {{ $receta->difficulty }} </small>
                        </p>
                        <a href="{{url('/recipe/show/' . $receta->id )}}" type="button"
                           class="btn btn-outline-primary btn-block">Ver más</a>

                    </div>

                </div>

            @endforeach
        </div>

@endsection