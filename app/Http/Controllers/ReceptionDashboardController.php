<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Fitness;
use App\FitnessUser;
use App\Http\Requests\SearchRequest;
use App\Session;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReceptionDashboardController extends Controller
{
    //
    public function showDashboard(){
        $fitness_id = session()->get('reception_fitness_id');
        $attendances = Attendance::where('fitness_id', $fitness_id);
        $relations = FitnessUser::where('fitness_id', $fitness_id)->where('role_id', 4)->orderBy('id', 'desc');
        $date_for_graph = mktime(date('H'), date('i'),date('s'),date('m'),date('d'),date('Y'));
        return view('reception.dashboard', compact('attendances', 'relations', 'date_for_graph'));
    }
    public function sessions(){
        $sessions = Session::where('fitness_id', session()->get('reception_fitness_id'))->orderBy('start_date', 'desc');
        return view('reception.classes.index', compact('sessions'));
    }
    public function search(SearchRequest $request){
        $input = $request->key;
        $fitness = Fitness::find(session()->get('reception_fitness_id'));
        $results = $fitness->members()
//            ->where('name', 'like', $input.'%')
//            ->orWhere('phone', 'like', $input.'%')
            ->where(function($query) use ($input){
                $query->where('name', 'LIKE', '%'.$input.'%');
                $query->orWhere('email', 'LIKE', '%'.$input.'%');
                $query->orWhere('phone', 'LIKE', '%'.$input.'%');

            })->orWherePivot('code', 'like', '%'.$input.'%')->limit('50')
        ;


        return view('reception.members.search', compact('results', 'input'));

    }
}
