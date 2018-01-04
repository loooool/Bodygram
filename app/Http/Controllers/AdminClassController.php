<?php

namespace App\Http\Controllers;

use App\FitnessUser;
use App\Http\Requests\AdminSessionCreateRequest;
use App\Http\Requests\ReceptionSessionEnrollRequest;
use App\Session;
use App\SessionAttendance;
use App\User;
use Illuminate\Http\Request;

class AdminClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fitness_id = session()->get('fitness_id');
        $classes = Session::where('fitness_id', $fitness_id)->orderBy('id', 'desc');
        $trainers = FitnessUser::where('fitness_id', $fitness_id)->where('role_id', 3);
        return view('admin.class.index', compact('trainers', 'classes'));
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
    public function store(AdminSessionCreateRequest $request)
    {
        //
        $input = $request->except(['end_date', 'start_date']);
        $input['fitness_id'] = session()->get('fitness_id');
        $input['end_date'] = date('Y-m-d', strtotime($request->end_date));
        $input['start_date'] = date('Y-m-d', strtotime($request->start_date));
        Session::create($input);
        return redirect(route('admin.classes.index'));
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

        $class = Session::find($id);
        if($class->fitness_id == session()->get('fitness_id')) {
            $trainer = User::find($class->trainer_id);
            $attendances = SessionAttendance::where('session_id', $class->id)->orderBy('id', 'desc');
            return view('admin.class.show', compact('class', 'trainer', 'attendances'));
        }

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
