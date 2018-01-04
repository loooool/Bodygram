<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
            if (Auth::user()->isAdmin()){
                if (Auth::user()->fitnessUser->where('role_id', 1)->where('fitness_id', session()->get('fitness_id'))->first()) {
                    return $next($request);
                }

            } else {
                return redirect()->back();
            }
        }

        return redirect('/login');
    }
}
