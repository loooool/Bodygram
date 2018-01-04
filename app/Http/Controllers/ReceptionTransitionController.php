<?php

namespace App\Http\Controllers;

use App\FitnessUser;
use App\Http\Requests\TransitionRequest;
use App\Transition;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ReceptionTransitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transitions = Transition::where('fitness_id', session()->get('reception_fitness_id'))
            ->whereRaw('date(created_at) > ?', [Carbon::today()->subDays(30)])->where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')->get();
        $debts = FitnessUser::where('fitness_id', session()->get('reception_fitness_id'))
            ->where('role_id', 4)->where('debt', '>', 0);
        return view('reception.transition.index', compact('transitions', 'debts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransitionRequest $request)
    {
        //register income
        $insert['value'] = $request->value;
        $insert['about'] = $request->about;
        $insert['fitness_id'] = session()->get('reception_fitness_id');
        $insert['user_id'] = Auth::user()->id;
        Transition::create($insert);
        return redirect(route('reception.transition.index'));
    }
    public function expense(TransitionRequest $request)
    {
        //register expense
        $insert['about'] = $request->about;
        $insert['value'] = 0 - $request->value;
        $insert['fitness_id'] = session()->get('reception_fitness_id');
        $insert['user_id'] = Auth::user()->id;
        Transition::create($insert);
        return redirect(route('reception.transition.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
