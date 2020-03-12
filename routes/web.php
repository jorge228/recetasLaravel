<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/inicio', function () {
    return view('inicio');
});*/

Route::get('/', function () {
    //por si falla en registro o algo
    //return view('inicio');
    return redirect('/recipe');
});
/*
Route::get('/', function () {
    return view('inicio', array('nombre' => 'Jorge'));
});
*/
Route::get('recipe', 'RecipeController@index');
Route::get('recipe/show/{id}', 'RecipeController@show')->middleware('verified');

Route::group(['middleware' => 'auth'], function () {
    Route::get('recipe/create', 'RecipeController@create');
    Route::post('recipe/create', 'RecipeController@postCreate');
    Route::put('recipe/show/{id}', 'RecipeController@putComentario');

    Route::get('recipe/edit/{id}', 'RecipeController@edit')->middleware('puede_editar');
    Route::put('recipe/edit/{id}', 'RecipeController@putEdit');
    Route::delete('recipe/delete/{id}', 'RecipeController@destroy');

    Route::delete('rating/delete/{id}', 'RatingController@destroy');

    Route::put('logout', 'HomeController@logout');

});

/* rutas creadas al ejecutar laravel/ui y ui vue --dev
el Atht::routes() incluye todas las rutas, página 99 apuntes */

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
