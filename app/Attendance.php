<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
        'user_id',
        'fitness_id',
    ];
    public function fitnessUser() {
        return $this->hasOne('App\FitnessUser', 'user_id', 'user_id');
    }

    //Scopes
    public function scopeToday($query)
    {
        return $query->whereDate('created_at' , '=', date('Y-m-d'));
    }

    public function scopeActive($query)
    {
        return $query->whereDate('created_at' , '>', Carbon::now()->subDays(7));
    }
}
