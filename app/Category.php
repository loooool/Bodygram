<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'fitness_id'];


    public function fitnessUsers() {
        return $this->hasMany('App\FitnessUser', 'category_id', 'id');
    }

}
