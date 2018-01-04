<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $fillable = ['name', 'fitness_id', 'trainer_id', 'price', 'seats', 'current_seats', 'start_date', 'end_date', 'time', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

    public function fitness(){
        return $this->hasOne('App\Fitness', 'id', 'fitness_id');
    }
    public function trainer(){
        return $this->hasOne('App\User', 'id', 'trainer_id');
    }
    public function members() {
        return $this->belongsToMany('App\User', 'session_users', 'session_id');
    }
}
