<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    //
    protected $fillable = [
        'fitness_id',
        'user_id',
        'value',
        'about',
        'user_id',
        ];

    //Scopes
    public function scopeMonth($query){
        return $query->whereDate('created_at', '>', Carbon::now()->subDays(30))->orderBy('id', 'desc');
    }

    //Relations
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
