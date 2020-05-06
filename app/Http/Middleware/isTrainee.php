<?php

namespace App\Http\Middleware;

use Closure;

class isTrainee
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
        if(auth()->user()->role == 'trainee'){
            return $next($request);
        }
        return redirect('home')->with('error', 'You don\'t have Trainee access');
    }
}
