<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Category;
use App\Debt;
use App\Expense;
use App\Fitness;
use App\FitnessUser;
use App\Http\Requests\ReceptionRegisterMember;
use App\Http\Requests\ReceptionStoreRegisteredRequest;
use App\Http\Requests\TransitionRequest;
use App\Pack;
use App\Session;
use App\Transition;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReceptionMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fitness_id = session()->get('reception_fitness_id');
        $members = FitnessUser::where('fitness_id', $fitness_id)->where('role_id', 4);
        return view('reception.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fitness_id = session()->get('reception_fitness_id');
        $fitness = Fitness::find($fitness_id);
        $categories = $fitness->categories;
        return view('reception.members.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceptionRegisterMember $request)
    {
        //
        $input = $request->except('category', 'code', 'birth_date');

        $pw = str_random(6);
        $input['password'] = bcrypt($pw);
        //Email of info
        $data = ['email'=> $request->email, 'password'=> $pw];
        Mail::send('emails.info', $data, function ($message) use ($input) {
            $message->to($input['email'], $input['name'])->subject("BODYGRAM Fitness System");
        });

        $birth_date_request = strtotime($request->birth_date);
        $birth_date = date('Y-m-d', $birth_date_request);
        $input['birth_date'] = $birth_date;

        $user = User::create($input);

        $category_id = $request->category_id;
        $fitness_id = session()->get('reception_fitness_id');

        $role_id = 4;
        $code = $request->code;
        $end_date = date('Y-m-d', strtotime($request->end_date));

        FitnessUser::create(['fitness_id'=>$fitness_id, 'role_id'=>$role_id, 'user_id'=>$user->id, 'code'=>$code, 'end_date'=>$end_date, 'category_id'=>$category_id]);


        if ($photo = $request->file(['photo'])) {
            $photo_name = time() . $photo->getClientOriginalName();
            $photo->move('assets/images', $photo_name);
            $user->photos()->create(['path'=>$photo_name]);
        }
        return redirect(route('reception.members.index'));



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
        $fitness = Fitness::find($fitness_id);
        $user = User::find($id);
        $relation = FitnessUser::where('fitness_id', $fitness_id)->where('role_id', 4)->where('user_id', $user->id)->orderBy('id', 'desc')->first();
        $packs = Pack::where('fitness_id', $fitness_id)->get();
        $attendances = Attendance::where('fitness_id', $fitness_id)->where('user_id', $user->id)->orderBy('id', 'desc')->get();
        $debts = Debt::where('fitness_id', $fitness_id)->where('user_id', $user->id)->orderBy('id', 'desc')->get();
        $expenses = Expense::where('fitness_id', $fitness_id)->where('user_id', $user->id)->orderBy('id', 'desc')->get();
        $classes = Session::where('fitness_id', $fitness_id)->where('end_date', '>=', date('Y-m-d'));
        $categories = $fitness->categories;
        return view('reception.members.profile', compact('relation', 'packs', 'attendances', 'debts', 'expenses', 'classes', 'categories'));
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
        $relation = FitnessUser::find($id);
        if($relation->fitness_id == session()->get('reception_fitness_id')){
            $input = $request->except('end_date', '_token');
            $input['end_date'] =  date('Y-m-d', strtotime($request->end_date));
            $relation->update($input);
            return redirect(route('reception.members.show', $relation->user->id));
        }
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

    public function  storeRegistered(ReceptionStoreRegisteredRequest $request) {
        if($user = User::all()->where('email', $request->email_registered)->first()) {
            if ($user->fitnessUser->where('fitness_id', session()->get('reception_fitness_id'))->isEmpty()) {
                $input = $request->except('email_registered', 'end_date');
                $input['user_id'] = $user->id;
                $input['end_date'] = date('Y-m-d', strtotime($request->end_date));
                $input['role_id'] = 4;
                $input['fitness_id'] = session()->get('reception_fitness_id');
                FitnessUser::create($input);
                return redirect(route('reception.members.index'));
            } else {
                $input['user_id'] = $user->id;
                $input['end_date'] = date('Y-m-d', strtotime($request->end_date));
                $input['role_id'] = 4;
                $input['fitness_id'] = session()->get('reception_fitness_id');
                $fitness_users =  $user->fitnessUser->where('fitness_id', session()->get('reception_fitness_id'))->first();
                FitnessUser::find($fitness_users->id)->update($input);
                return redirect(route('reception.members.index'));
            }
        } else {
            return 'do not have';
        }


    }
    public function date(Request $request){
        //necessary data
        $fitness_id = session()->get('reception_fitness_id');
        $user_id = $request->user_id;
        $pack = Pack::find($request->pack_id);
        $relation = FitnessUser::where('fitness_id', $fitness_id)->
        where('role_id', 4)->
        where('user_id', $user_id)->
        orderBy('id', 'desc')->first();

        //end date update
        $end_date =  Carbon::parse($relation->end_date);
        if ($end_date > Carbon::now()) {
            $update_date = $end_date->addDays($pack->days);
        } else {
            $update_date = Carbon::now()->addDays($pack->days);
        }

        $relation->end_date = $update_date;
        $relation->save();

        //debt register
        if (isset($request->value)) {
            if ($request->value > 0) {
                $debt = $relation->debt;
                $relation->debt = $debt + $request->value;
                $relation->save();
                $debt_value = $pack->price - $request->value;
                $about = trans('form.lent') . ':' . $pack->name;
                Debt::create(['fitness_id'=>$fitness_id, 'user_id'=>$user_id, 'value'=>$request->value, 'about'=>$about, 'reception_id'=>Auth::user()->id]);
                Expense::create(['fitness_id'=>$fitness_id, 'user_id'=>$user_id, 'value'=>$debt_value, 'about'=>$about, 'reception_id'=>Auth::user()->id]);
                Transition::create(['fitness_id'=>$fitness_id, 'value'=>$debt_value, 'about'=>$pack->name, 'user_id'=>Auth::user()->id]);
                return redirect(route('reception.members.show', $user_id));
            } else {
                Expense::create(['fitness_id'=>$fitness_id, 'user_id'=>$user_id, 'value'=>$pack->price, 'about'=>$pack->name, 'reception_id'=>Auth::user()->id]);
                Transition::create(['fitness_id'=>$fitness_id, 'value'=>$pack->price, 'about'=>$pack->name, 'user_id'=>Auth::user()->id]);
                return redirect(route('reception.members.show', $user_id));
            }
        } else {
            Expense::create(['fitness_id'=>$fitness_id, 'user_id'=>$user_id, 'value'=>$pack->price, 'about'=>$pack->name, 'reception_id'=>Auth::user()->id]);
            Transition::create(['fitness_id'=>$fitness_id, 'value'=>$pack->price, 'about'=>$pack->name, 'user_id'=>Auth::user()->id]);
            return redirect(route('reception.members.show', $user_id));
        }
    }
    public function debt(TransitionRequest $request){
        $fitness_id = session()->get('reception_fitness_id');
        $user_id = $request->user_id;
        $about = $request->about;
        $value = $request->value;
        $relation = FitnessUser::where('fitness_id', $fitness_id)->
        where('role_id', 4)->
        where('user_id', $user_id)->
        orderBy('id', 'desc')->first();
        $relation->debt = $relation->debt + $value;
        $relation->save();
        Debt::create(['fitness_id'=>$fitness_id, 'user_id'=>$user_id, 'value'=>$value, 'about'=>$about, 'reception_id'=>Auth::user()->id]);
        return redirect(route('reception.members.show', $user_id));
    }
    public function pay(TransitionRequest $request){
        $fitness_id = session()->get('reception_fitness_id');
        $user_id = $request->user_id;
        $value = $request->value;
        $about = $request->about;
        $relation = FitnessUser::where('fitness_id', $fitness_id)->
        where('role_id', 4)->
        where('user_id', $user_id)->
        orderBy('id', 'desc')->first();
        $relation->debt = $relation->debt - $value;
        $relation->save();
        Expense::create(['fitness_id'=>$fitness_id, 'user_id'=>$user_id, 'value'=>$value, 'about'=>$about, 'reception_id'=>Auth::user()->id]);
        Transition::create(['fitness_id'=>$fitness_id, 'value'=>$value, 'about'=>$about, 'user_id'=>Auth::user()->id]);
        return redirect(route('reception.members.show', $user_id));
    }
}
