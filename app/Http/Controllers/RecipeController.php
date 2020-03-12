<?php

namespace App\Http\Controllers;

use App\Food;
use App\Http\Requests\ValidationFormComentario;
use App\Http\Requests\ValidationFormRequest;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$peliculas=Movie::all(); y envíc las recetas
        $recetas = Food::all();
        return view('recipe.index')->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create');
    }

    //ValidationFormRequest
    public function postCreate(ValidationFormRequest $request)
    {
        //$receta = Food::findOrfail($request->input('name'));
        $query = DB::table('foods')
            ->where('name', '=', $request->input('name'))
            ->get();
        if ($query->count() > 0) {
            flash('El nombre de la receta ya se encuentra en la base de datos.');
            return redirect('/recipe');
        }

        $request->validated();
        $food = new Food();
        $food->name = $request->input('name');
        $food->difficulty = $request->input('difficulty');
        $food->time = $request->input('time');
        $food->price = $request->input('price');
        $food->kcal = $request->input('kcal');
        $food->description = $request->input('description');
        $food->image = $request->file('image')->move('images', $request->file('image')->getClientOriginalName());
        $food->save();
        flash('Receta añadida correctamente.');
        return redirect('/recipe');
    }

    //ValidationFormRequest
    public function putComentario(ValidationFormComentario $request, $id)
    {
        $request->validated();
        $rating = new Rating();
        $rating->user_id = Auth::user()->id;
        $rating->food_id = $id;
        $rating->opinion = $request->input('comentario');
        $rating->save();
        flash('Comentario añadido correctamente.');
        return redirect('/recipe/show/' . $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //hacer join para poder saber valoracion y usuario
        $receta = Food::findOrfail($id);
        $valoracion = DB::table('ratings')
            ->where('food_id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('recipe.show')
            ->with('receta', $receta)
            ->with('valoraciones', $valoracion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receta = Food::findOrfail($id);
        return view('recipe.edit')->with('receta', $receta);
    }


    public function putEdit(ValidationFormRequest $request, $id)
    {
        $request->validated();

        $food = Food::findOrfail($id);
        $food->name = $request->input('name');
        $food->difficulty = $request->input('difficulty');
        $food->price = $request->input('price');
        $food->time = $request->input('time');
        $food->kcal = $request->input('kcal');
        $food->description = $request->input('description');

        if ($request->hasFile('image')) {
            $food->image = $request->file('image')->move('images', $request->file('image')->getClientOriginalName());
        }
        $food->save();
        flash('Receta modificada correctamente.');
        return redirect('/recipe/show/' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('ratings')->where('food_id', '=', $id)->delete();
        DB::table('foods')->where('id', '=', $id)->delete();
        flash('Receta y comentarios eliminados correctamente.');
        return redirect('/recipe');
    }
}
