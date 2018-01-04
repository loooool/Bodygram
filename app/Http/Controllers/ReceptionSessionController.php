<?php

namespace App\Http\Controllers;

use App\Debt;
use App\Expense;
use App\FitnessUser;
use App\Http\Requests\ReceptionSessionEnrollRequest;
use App\Session;
use App\SessionUser;
use App\Transition;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReceptionSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ReceptionSessionEnrollRequest $request)
    {
        //
        $session = Session::find($request->session_id);

        if($session->current_seats < $session->seats) {
            $user_id = $request->user_id;
            $fitness_id = session()->get('reception_fitness_id');
            $user = User::find($user_id);
            $relation = FitnessUser::where('fitness_id', $fitness_id)->
            where('role_id', 4)->
            where('user_id', $user_id)->
            orderBy('id', 'desc')->first();

            $input = $request->except(['value', '_token']);
            SessionUser::create($input);

            $update_seats = $session->current_seats + 1;
            $session->update(['current_seats'=>$update_seats]);

            if (isset($request->value)) {
                if ($request->value > 0) {
                    $debt = $relation->debt;
                    $relation->debt = $debt + $request->value;
                    $relation->save();
                    $debt_value = $session->price - $request->value;
                    $about = trans('form.lent') . ':' . $session->name;
                    Debt::create(['fitness_id'=>$fitness_id, 'user_id'=>$user_id, 'value'=>$request->value, 'about'=>$about, 'reception_id'=>Auth::user()->id]);
                    Expense::create(['fitness_id'=>$fitness_id, 'user_id'=>$user_id, 'value'=>$debt_value, 'about'=>$about, 'reception_id'=>Auth::user()->id]);
                    Transition::create(['fitness_id'=>$fitness_id, 'value'=>$debt_value, 'about'=>$session->name, 'user_id'=>Auth::user()->id]);
                    return redirect(route('reception.members.show', $user_id));
                } else {
                    Expense::create(['fitness_id'=>$fitness_id, 'user_id'=>$user_id, 'value'=>$session->price, 'about'=>$session->name, 'reception_id'=>Auth::user()->id]);
                    Transition::create(['fitness_id'=>$fitness_id, 'value'=>$session->price, 'about'=>$session->name, 'user_id'=>Auth::user()->id]);
                    return redirect(route('reception.members.show', $user_id));
                }
            } else {
                Expense::create(['fitness_id'=>$fitness_id, 'user_id'=>$user_id, 'value'=>$session->price, 'about'=>$session->name, 'reception_id'=>Auth::user()->id]);
                Transition::create(['fitness_id'=>$fitness_id, 'value'=>$session->price, 'about'=>$session->name, 'user_id'=>Auth::user()->id]);
                return redirect(route('reception.members.show', $user_id));
            }

        }



        return redirect('reception.members.show', $request->user_id);
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
