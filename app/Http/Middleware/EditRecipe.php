<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EditRecipe
{
    //en el kernel 'puede_editar'
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //registro más tres minutos
        $registro = strtotime(Auth::user()->created_at);
        $ahora = time();
        if($ahora-$registro>180){
            return $next($request);
        }
        flash('No han pasado 3 minutos desde su registro y no puede edirar');
        return redirect('recipe');

    }
}
