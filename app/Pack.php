<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    //
    protected $fillable = ['name', 'price', 'days', 'fitness_id'];
}
