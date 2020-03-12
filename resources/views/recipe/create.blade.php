@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Añadir Receta
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Nombre de la Receta</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        @if($errors->has('name'))
                            <span style="color:red">{{ $errors->first() }}</span>
                        @endif

                        <div class="form-group">
                            <label for="difficulty">Dificultad</label>
                            <select class="form-control" name="difficulty">
                                <option value="Fácil">Fácil</option>
                                <option value="Media">Media</option>
                                <option value="Difícil">Difícil</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="time">Tiempo</label>
                            <input type="number" name="time" id="time" class="form-control" value="{{ old('time') }}">
                        </div>
                        @error('time')
                        <span style="color:red">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="price">Precio</label>
                            <input type="number" step="0.1" name="price" id="price" class="form-control" value="{{ old('price') }}">
                        </div>
                        @error('price')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="kcal">Kcal</label>
                            <input type="number" name="kcal" id="kcal" class="form-control" value="{{ old('kcal') }}">
                        </div>
                        @error('kcal')
                        <span style="color:red">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <br><label for="description">Descripción</label>
                            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                        <span style="color:red">{{ $message }}</span>
                        @enderror

                        <div class="custom-file mt-4">
                            <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="es" required>
                            <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
                        </div>
                        @error('image')
                        <span style="color:red">{{ $message }}</span>
                        @enderror


                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Añadir Receta
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection