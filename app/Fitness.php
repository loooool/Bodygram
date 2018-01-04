<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fitness extends Model
{
    //
    protected $fillable = [
        'name',
        'end_date',
        'phone_number',
    ];
    public function packs(){
        return $this->hasMany('App\Pack', 'fitness_id', 'id');
    }
    public function members(){
        return $this->belongsToMany('App\User', 'fitness_users', 'fitness_id', 'user_id')
            ->wherePivot('role_id', 4)->withPivot('category_id', 'code', 'debt', 'end_date');
    }
    public function  attendances(){
        return $this->hasMany('App\Attendance', 'fitness_id', 'id')->orderBy('id', 'desc');
    }
    public function relations(){
        return $this->hasMany('App\FitnessUser', 'fitness_id', 'id');
    }
    public function  categories(){
        return $this->hasMany('App\Category', 'fitness_id', 'id')->orderBy('id', 'desc');
    }

}
