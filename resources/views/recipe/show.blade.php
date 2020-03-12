@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-4">
                <img src="{{asset($receta->image)}}" class="img-thumbnail"/>
            </div>
            <div class="col-sm-4">
                <h2>{{$receta->name}}</h2>
                <hr>
                <h4>Info.</h4>
                <p>Dificultad: {{ $receta->difficulty }}</p>
                <p>{{ $receta->time }} minutos</p>
                <p>Precio: {{ $receta->price }} €/persona</p>
                <p> {{ $receta->kcal }} kcal por 100g</p>
            </div>
            <div class="col-sm-4 text-center">
                @if(Auth::check())
                    <a href="{{action('RecipeController@edit', $receta->id)}}" type="button" class="btn btn-primary">Editar</a>
                    @if(Auth::user()->rol == 'admin')
                        <form action="{{action('RecipeController@destroy', $receta->id)}}" method="POST"
                              style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger"> Eliminar
                            </button>
                        </form>
                    @endif
                    <a href="{{url('/recipe')}}" type="button" class="btn btn-secondary">Volver</a>
                @endif

            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="card text-white bg-info mb-3" style="max-width: 100%;">
                    <div class="card-header"><strong>Preparación</strong></div>
                    <div class="card-body">
                        <p class="card-text">{{ $receta->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <h1>Opiniones</h1>
                <hr>
                @foreach($valoraciones as $valoracion)
                    <div class="card bg-light mb-3" style="max-width: 100%;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <strong>{{ \App\User::find($valoracion->user_id)->name }}</strong>
                                </div>
                                <div class="col-6">
                                    @if(Auth::check() && ((Auth::user()->id)==(\App\Rating::find($valoracion->id)->user_id) || (Auth::user()->rol=='admin')))
                                        <form action="{{action('RatingController@destroy', $valoracion->id)}}" method="POST" style="float:right">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit"  style="display:inline"><strong>X</strong></button>
                                        </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $valoracion->opinion }}</p>
                            <p class="card-text text-right">
                                <small class="text-muted">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $valoracion->created_at)->format('d-M-Y, H:i:s') }}</small>
                            </p>
                        </div>
                    </div>
                    <!--  <p>  \App\Rating::find($valoracion->id)->user_id  </p>-->
                @endforeach
            </div>
        </div>

        @if(Auth::check())
            <div class="card-body" style="padding:30px">
                <form action="{{action('RecipeController@putComentario', $receta->id )}}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <br><label for="comentario">Envíanos tu comentario</label>
                        <textarea name="comentario" id="comentario" class="form-control"
                                  rows="3"></textarea>
                    </div>
                    @error('comentario')
                    <span style="color:red">{{ $message }}</span>
                    @enderror
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        @endif

    </div>
@endsection