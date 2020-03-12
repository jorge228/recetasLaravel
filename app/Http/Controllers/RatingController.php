<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function destroy($id)
    {
        DB::table('ratings')->where('id','=', $id)->delete();
        flash('Comentario eliminado correctamente.');
        return redirect('/recipe');
    }
}
