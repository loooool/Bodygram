<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role_id',
        'photo_id',
        'sex',
        'birth_date',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /**
     * Scopes for members
     */
    public function scopeFemale($query){
        return $query->where('sex', 0);
    }


    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }

    public function fitnessUser(){
        return $this->hasMany('App\FitnessUser', 'user_id', 'id');
    }
    public function relation(){
        $fitness_id = session()->get('fitness_id');
        return $this->hasMany('App\FitnessUser', 'user_id', 'id')->where('fitness_id', $fitness_id)->orderBy('id', 'desc')->first();
    }
    public function receptionRelation(){
        $fitness_id = session()->get('reception_fitness_id');
        return $this->hasMany('App\FitnessUser', 'user_id', 'id')->where('fitness_id', $fitness_id)->orderBy('id', 'desc')->first();
    }

    public function healths(){
        return $this->hasMany('App\Health', 'user_id', 'id')->orderBy('id', 'desc');
    }
    public function health(){
        return $this->hasMany('App\Health', 'user_id', 'id')->orderBy('id', 'desc')->first();
    }

    public function fitnesses(){
        return $this->belongsToMany('App\Fitness', 'fitness_users', 'user_id', 'fitness_id');
    }

    public function sessions(){
        return $this->belongsToMany('App\Session', 'session_users')->orderBy('id', 'desc');
    }
    public function userSessionAttendance(){
        return $this->hasMany('App\SessionAttendance', 'user_id', 'id')->orderBy('id', 'desc');
    }
    public function attendances(){
        return $this->hasMany('App\Attendance', 'user_id', 'id');
    }
    public function attendances_for_count(){
        return $this->hasMany('App\Attendance', 'user_id', 'id')->latest();
    }


    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }


    public function isAdmin(){
        if($this->fitnessUser->where('role_id', 1)) {
            return true;
        }
        return false;
    }
    public function isReception(){
        if($this->fitnessUser->where('role_id', 2)) {
            return true;
        }
        return false;
    }
    public function isTrainer(){
        if($this->fitnessUser->where('role_id', 3)) {
            return true;
        }
        return false;
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
