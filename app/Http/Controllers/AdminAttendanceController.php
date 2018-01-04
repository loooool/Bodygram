<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Http\Requests\ReceptionAttendanceDateRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminAttendanceController extends Controller
{
    //
    public function index(){
        $date_for_graph = mktime(date('H'), date('i'),date('s'),date('m'),date('d'),date('Y'));
        $attendances = Attendance::where('fitness_id', session()->get('fitness_id'))->whereDate('created_at', '=' , date('Y-m-d'))->orderBy('id', 'desc');
        return view('admin.attendance.index', compact('attendances', 'date_for_graph'));
    }
    public function date(ReceptionAttendanceDateRequest $request){
        $date = strtotime($request->date);
        $date_for_date = date('Y-m-d', $date);
        $date_for_graph = mktime(0, 0,0, date('m', $date),date('d', $date),date('Y', $date));
        $attendances = Attendance::where('fitness_id', session()->get('fitness_id'))->whereDate('created_at', '=' , $date_for_date)->orderBy('id', 'desc');
        return view('admin.attendance.index', compact('attendances', 'date_for_graph'));
    }
}
