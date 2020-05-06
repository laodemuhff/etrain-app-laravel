<?php

namespace App\Http\Middleware;

use Closure;

class isMentor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->role == "mentor"){
            return $next($request);
        }
        return redirect('home')->with('error', 'You don\'t have Mentor access.');
    }
}
