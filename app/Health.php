<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    //
    protected $fillable = ['user_id', 'height', 'weight', 'head', 'neck', 'shoulder', 'chest', 'waist', 'hip', 'forearm', 'bicep', 'thigh', 'shin'];
}
