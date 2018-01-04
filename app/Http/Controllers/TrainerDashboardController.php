<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Fitness;
use App\FitnessUser;
use App\Http\Requests\SearchRequest;
use App\Session;
use Illuminate\Http\Request;

class TrainerDashboardController extends Controller
{
    //
    public function index(){
        $fitness_id = session()->get('trainer_fitness_id');
        $attendances = Attendance::where('fitness_id', $fitness_id);
        $date_for_graph = mktime(date('H'), date('i'),date('s'),date('m'),date('d'),date('Y'));
        $relations = FitnessUser::where('fitness_id', $fitness_id)->where('role_id', 4)->orderBy('id', 'desc');
        $week = [1=>'mon', 2=>'tue', 3=>'wed', 4=>'thu', 5=>'fri', 6=>'sat', 0=>'sun'];
        $sessions = Session::where('fitness_id', session()->get('trainer_fitness_id'))->where('end_date', '>=', date('Y-m-d'))
            ->where('start_date', '<=', date('Y-m-d'))->where($week[date('w')], 1);
        return view('trainer.dashboard', compact('sessions', 'date_for_graph', 'attendances', 'relations'));
    }
    public function search(SearchRequest $request){
        $input = $request->key;
        $fitness = Fitness::find(session()->get('trainer_fitness_id'));
        $results = $fitness->members()
//            ->where('name', 'like', $input.'%')
//            ->orWhere('phone', 'like', $input.'%')
            ->where(function($query) use ($input){
                $query->where('name', 'LIKE', '%'.$input.'%');
                $query->orWhere('email', 'LIKE', '%'.$input.'%');
                $query->orWhere('phone', 'LIKE', '%'.$input.'%');

            })->orWherePivot('code', 'like', '%'.$input.'%')->limit('50')
        ;


        return view('trainer.members.search', compact('results', 'input'));

    }

}
