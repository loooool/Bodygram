<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionAttendance extends Model
{
    //
    protected $fillable = ['user_id', 'session_id'];
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
