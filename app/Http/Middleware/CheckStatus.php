<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CheckStatus
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
        if(Auth::check() && Auth::user()->status == false){
            Log::info(Auth::user()->name . ', with the id: ' . Auth::user()->id . ', has tried to log in while idle.');
            // Auth::logout();
            // $request->session()->invalidate();
            // $request->session()->regenerateToken();
            $request->session()->flush();
            return redirect()->guest('/login')->withErrors([__('Your account is not active.')]);
        };

        return $next($request);
    }
}
