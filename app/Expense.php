<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    protected $fillable = [
        'user_id',
        'fitness_id',
        'value',
        'about',
        'reception_id'
    ];
}
