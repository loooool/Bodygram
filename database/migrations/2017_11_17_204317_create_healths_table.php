<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->float('height');
            $table->float('weight');
            $table->float('neck');
            $table->float('chest');
            $table->float('waist');
            $table->float('forearm');
            $table->float('bicep');
            $table->float('hip');
            $table->float('thigh');
            $table->float('shin');
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
        Schema::dropIfExists('healths');
    }
}
