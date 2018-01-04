<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FitnessUser extends Model
{
    //
    protected $fillable = [
        'user_id',
        'fitness_id',
        'role_id',
        'code',
        'end_date',
        'category_id',
    ];

    //Scopes
    public function scopeNew($query){
        return $query->whereDate('created_at' , '>=', Carbon::now()->subDays(30));
    }

    public function role() {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function category() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
    public function fitness() {
        return $this->hasOne('App\Fitness', 'id', 'fitness_id');
    }
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function users() {
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    public function attendances() {
        return $this->hasMany('App\Attendance', 'user_id', 'user_id');
    }

}
