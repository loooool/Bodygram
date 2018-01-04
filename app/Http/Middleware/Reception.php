<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Reception
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
        if (Auth::check()){
            if (Auth::user()->isReception()){
                if (Auth::user()->fitnessUser->where('role_id', 2)->where('fitness_id', session()->get('reception_fitness_id'))->first()) {
                    return $next($request);
                }

            } else {
                return redirect()->back();
            }
        }

        return redirect('/login');
    }
}
