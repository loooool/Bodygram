<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Trainer
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
            if (Auth::user()->isTrainer()){
                if (Auth::user()->fitnessUser->where('role_id', 3)->where('fitness_id', session()->get('trainer_fitness_id'))->first()) {
                    return $next($request);
                }

            } else {
                return redirect()->back();
            }
        }

        return redirect('/login');
    }
}
