<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($user = Auth::user()->fitnessUser->isEmpty()){
                return redirect('/home');
            } else {
                if($user = Auth::user()->fitnessUser->where('role_id', 1)->first()) {
                    session()->put(['fitness_id'=>$user->fitness_id]);
                    return redirect('/admin');
                } elseif ($user = Auth::user()->fitnessUser->where('role_id', 2)->first()) {
                    session()->put(['reception_fitness_id'=>$user->fitness_id]);
                    return redirect('/reception');
                } elseif ($user = Auth::user()->fitnessUser->where('role_id', 3)->first()) {
                    session()->put(['trainer_fitness_id'=>$user->fitness_id]);
                    return redirect('/trainer');
                } else {
                    return redirect('/home');
                }
            }
        }

        return $next($request);
    }
}
