<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Category;
use App\Fitness;
use App\FitnessUser;
use App\Transition;
use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    //
    public function showDashboard(){
        $user = Auth::user();
        $fitness_id = session()->get('fitness_id');
        $fitness = Fitness::find($fitness_id);
        $attendances = Attendance::where('fitness_id', $fitness_id);
        $relations = FitnessUser::where('fitness_id', $fitness_id)->where('role_id', 4)->orderBy('id', 'desc');
        $transitions = Transition::where('fitness_id', $fitness_id)->orderBy('id', 'desc');
        return view('admin.dashboard', compact('user', 'fitness', 'attendances', 'relations', 'transitions'));
    }

    public function fitnessSession($id){
        $fitness_id = (int)$id;
        $user = Auth::user();
        if($user->fitnessUser->where('fitness_id', $fitness_id)->where('role_id', 1)->count()) {
            session()->put(['fitness_id'=>$fitness_id]);
            return redirect()->back();
        }
        return redirect('404');
    }

    public function data(){

    }
}
