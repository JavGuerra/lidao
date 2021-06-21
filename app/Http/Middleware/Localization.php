<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Obtiene el idioma si la variable 'locale' de la sesión, y lo pasa a App
        if (session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        }
        return $next($request);
    }
}
