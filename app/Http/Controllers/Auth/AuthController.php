<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
//    protected function authenticated()
//    {
//        if (!empty(Auth::user())) {
//            if ($user = Auth::user()->fitnessUser->isEmpty()){
//                return redirect('/member');
//            } else {
//                if($user = Auth::user()->fitnessUser->where('role_id', 1)->first()) {
//                    session()->put(['fitness_id'=>$user->fitness_id]);
//                    return redirect('/admin');
//                } elseif ($user = Auth::user()->fitnessUser->where('role_id', 2)->first()) {
//                    session()->put(['reception_fitness_id'=>$user->fitness_id]);
//                    return redirect('/reception');
//                } elseif ($user = Auth::user()->fitnessUser->where('role_id', 3)->first()) {
//                    session()->put(['trainer_fitness_id'=>$user->fitness_id]);
//                    return redirect('/trainer');
//                } else {
//                    return redirect('/member');
//                }
//            }
//        } else {
//            return redirect(route('login'));
//        }
//
//
//
//
//    }

//    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
