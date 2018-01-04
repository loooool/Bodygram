<?php

namespace App\Http\Controllers;

use App\Fitness;
use App\FitnessUser;
use App\Http\Requests\AdminRegisteredUserRegisterRequest;
use App\Http\Requests\AdminRegisterUserRequest;
use App\Photo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $fitness_id = session()->get('fitness_id');
        if ($user->fitnessUser->where('fitness_id', $fitness_id)->where('role_id', 1)) {
            $fitness = Fitness::find($fitness_id);
        }
        $fitness_relations = $user->fitnessUser->where('role_id', 1);
        $members = FitnessUser::where('fitness_id', $fitness_id)->whereIn('role_id', [1, 2, 3])->get();


        return view('admin.users.index', compact('user', 'fitness', 'fitness_relations', 'members'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        $fitness_id = session()->get('fitness_id');
        if ($user->fitnessUser->where('fitness_id', $fitness_id)->where('role_id', 1)) {
            $fitness = Fitness::find($fitness_id);
        }
        $fitness_relations = $user->fitnessUser->where('role_id', 1);

        return view('admin.users.create', compact('user', 'fitness', 'fitness_relations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRegisterUserRequest $request)
    {
        //
        $input_to_user = $request->except('photo', 'role', 'repassword');

        //password hashing
        $pw = str_random(6);
        $input_to_user['password'] = bcrypt($pw);
        //Email of info
        $data = ['email'=> $request->email, 'password'=> $pw];
        Mail::send('emails.info', $data, function ($message) use ($input_to_user) {
            $message->to($input_to_user['email'], $input_to_user['name'])->subject("BODYGRAM Fitness System");
        });

        //date format
        $birth_date_request = strtotime($request->birth_date);
        $birth_date = date('Y-m-d', $birth_date_request);
        $input_to_user['birth_date'] = $birth_date;


        //creating user
        $user = User::create(['name'=>$request->name, 'email'=>$request->email, 'sex'=>$request->sex, 'birth_date'=>$birth_date, 'phone'=>$request->phone,
            'password'=>$pw]);

        //role
        $fitness_id = session()->get('fitness_id');
        $role_id = $request->role;
        FitnessUser::create(['fitness_id'=>$fitness_id, 'role_id'=>$role_id, 'user_id'=>$user->id]);


        //photo
        if ($photo = $request->file(['photo'])) {
            $photo_name = time() . $photo->getClientOriginalName();
            $photo->move('assets/images', $photo_name);
            $user->photos()->create(['path'=>$photo_name]);
        }
        return redirect(route('admin.users.index'));
//        return $request->phone_number;

    }

    public function storeRegistered(AdminRegisteredUserRegisterRequest $request)
    {
        //
        $email = $request->email_registered;
        $user_id = User::where('email', $email)->first()->id;
        $role_id = $request->role_registered;
        $fitness_id = session()->get('fitness_id');
        FitnessUser::create(['user_id'=>$user_id, 'role_id'=>$role_id, 'fitness_id'=>$fitness_id, 'code'=>'00000000']);
        return redirect(route('admin.users.index'));
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
        $fitness_users = FitnessUser::findOrFail($id);
        $fitness_users->delete();
        return redirect(route('admin.users.index'));
    }
}
