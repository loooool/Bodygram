<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Debt;
use App\FitnessUser;
use App\Http\Requests\ReceptionAttendanceDateRequest;
use App\Http\Requests\ReceptionAttendanceRequest;
use App\SessionAttendance;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReceptionAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $date_for_graph = mktime(date('H'), date('i'),date('s'),date('m'),date('d'),date('Y'));
        $attendances = Attendance::where('fitness_id', session()->get('reception_fitness_id'))->whereDate('created_at', '=' , date('Y-m-d'))->orderBy('id', 'desc');
        return view('reception.attendance.index', compact('attendances', 'date_for_graph'));
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
    public function store(ReceptionAttendanceRequest $request)
    {
        //add more security note

        //checking user
        if($relation = FitnessUser::where('fitness_id', session()->get('reception_fitness_id'))->where('role_id', 4)->where('code', $request->code)->first()) {
            //checking user's session
            $week = [1=>'mon', 2=>'tue', 3=>'wed', 4=>'thu', 5=>'fri', 6=>'sat', 0=>'sun'];
            $sessions = $relation->user->sessions->where('fitness_id', session()->get('reception_fitness_id'))->where('end_date', '>=', date('Y-m-d'))
                ->where('start_date', '<=', date('Y-m-d'))->where($week[date('w')], 1)->where('time', '<', Carbon::now()->addHour(1)->format('H:i:s'))
                ->where('time', '>', Carbon::now()->subHour(1)->format('H:i:s'));
            if($session = $sessions->first()){
                $input['user_id'] = $relation->user_id;
                $input['fitness_id'] = session()->get('reception_fitness_id');
                Attendance::create($input);
                $input_to_session_attendance['user_id'] = $relation->user_id;
                $input_to_session_attendance['session_id'] = $session->id;
                SessionAttendance::create($input_to_session_attendance);
                session()->flash('status', $session->name . ' ' . $session->time);
                return redirect(route('reception.attendance.show', [$relation->id]));
            }
            if ($relation->end_date >= date('Y-m-d')) {
                //registering attendance
                $input['user_id'] = $relation->user_id;
                $input['fitness_id'] = session()->get('reception_fitness_id');
                Attendance::create($input);
                session()->flash('status', trans('form.successful'));
                return redirect(route('reception.attendance.show', [$relation->id]));
            } else {
                //if date ended
                session()->flash('status', trans('form.date_ended'));
                return redirect(route('reception.attendance.show', [$relation->id]));
            }


        } else {
            //if not found
            return view('reception.attendance.not_found');
        }

    }
    public function date(ReceptionAttendanceDateRequest $request){
        $date = strtotime($request->date);
        $date_for_date = date('Y-m-d', $date);
        $date_for_graph = mktime(0, 0,0, date('m', $date),date('d', $date),date('Y', $date));
        $attendances = Attendance::where('fitness_id', session()->get('reception_fitness_id'))->whereDate('created_at', '=' , $date_for_date)->orderBy('id', 'desc');
        return view('reception.attendance.index', compact('attendances' , 'date_for_graph'));
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
        $fitness_id = session()->get('reception_fitness_id');
        $relation = FitnessUser::find($id);
        $member = $relation->user;
        $attendances = Attendance::where('fitness_id', $relation->fitness_id)->where('user_id', $member->id)->orderBy('id', 'desc')->limit(5)->get();
        $attendances_count = Attendance::where('fitness_id', $relation->fitness_id)->where('user_id', $member->id)->count();
        $debts = Debt::where('fitness_id', $fitness_id)->where('user_id', $member->id)->orderBy('id', 'desc')->get();
        return view('reception.attendance.show', compact('relation', 'debts', 'attendances', 'attendances_count'));
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
