<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\SessionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $week = [1=>'mon', 2=>'tue', 3=>'wed', 4=>'thu', 5=>'fri', 6=>'sat', 0=>'sun'];
        $sessions = $user->sessions->where('end_date', '>=', date('Y-m-d'))
            ->where('start_date', '<=', date('Y-m-d'))->where($week[date('w')], 1);
        return view('home', compact('user', 'sessions'));
    }
}
