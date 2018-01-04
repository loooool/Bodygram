<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\FitnessUser;
use App\Health;
use App\User;
use Illuminate\Http\Request;

class TrainerMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = FitnessUser::where('fitness_id', session()->get('trainer_fitness_id'))->where('role_id', 4);
        return view('trainer.members.index', compact('members'));
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
    public function store(Request $request)
    {
        //
        $member = $request->user_id;
        $input = $request->except(['_token']);
        Health::create($input);
        return redirect(route('trainer.members.show', $member));
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
        $fitness_id = session()->get('trainer_fitness_id');
        $user = User::find($id);
        $attendances = Attendance::where('fitness_id', $fitness_id)->where('user_id', $user->id)->orderBy('id', 'desc');
        $relation = FitnessUser::where('fitness_id', $fitness_id)->where('role_id', 4)->where('user_id', $user->id)->orderBy('id', 'desc')->first();
        $measurements = $relation->user->healths->sortBy('id');
        return view('trainer.members.show', compact('relation', 'attendances', 'measurements'));
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
