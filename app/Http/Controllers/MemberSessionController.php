<?php

namespace App\Http\Controllers;

use App\Session;
use App\SessionAttendance;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $sessions = $user->sessions->where('end_date', '>=', date('Y-m-d'))
            ->where('start_date', '<=', date('Y-m-d'));
        return view('member.classes.index', compact('sessions'));
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
        $user = Auth::user();
        $class = Session::find($id);
        if ($user->sessions->where('id', $class->id)->count()) {
            $trainer = User::find($class->trainer_id);
            $attendances = $user->userSessionAttendance->where('session_id', $class->id);
            return view('member.classes.show', compact('trainer', 'attendances', 'class'));
        } else {
            return redirect('404');
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
