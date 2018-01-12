<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitnessUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitness_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fitness_id');
            $table->integer('user_id');
            $table->integer('role_id');
            $table->string('code');
            $table->date('end_date');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fitness_users');
    }
}
