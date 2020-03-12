@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar Receta
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{action('RecipeController@putEdit', $receta->id)}}" method="POST"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$receta->name}}">
                        </div>
                        @if($errors->has('name'))
                            <span style="color:red">{{ $errors->first() }}</span>
                        @endif

                        <div class="form-group">
                            <label for="difficulty">Dificultad</label>
                            <select class="form-control" name="difficulty">
                                <option value="Fácil" @if($receta->difficulty=='Fácil') selected @endif>Fácil</option>
                                <option value="Media" @if($receta->difficulty=='Media') selected @endif>Media</option>
                                <option value="Difícil" @if($receta->difficulty=='Difícil') selected @endif>Difícil</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="time">Tiempo de preparación</label>
                            <input type="number" name="time" id="time" class="form-control" value="{{$receta->time}}">
                        </div>
                        @error('time')
                        <span style="color:red">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="price">Precio</label>
                            <input type="number" step="0.1" name="price" id="price" class="form-control"
                                   value="{{$receta->price}}">
                        </div>
                        @error('price')
                        <span style="color:red">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="kcal">Calorías</label>
                            <input type="number" name="kcal" id="price" class="form-control"
                                   value="{{$receta->kcal}}">
                        </div>
                        @error('kcal')
                        <span style="color:red">{{ $message }}</span>
                        @enderror

                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="es">
                            <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
                        </div>
                        @error('image')
                        <span style="color:red">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <br><label for="synopsis">Descripción</label>
                            <textarea name="description" id="description" class="form-control"
                                      rows="3">{{$receta->description}}</textarea>
                        </div>
                        @error('description')
                        <span style="color:red">{{ $message }}</span>
                        @enderror

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar Receta
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection