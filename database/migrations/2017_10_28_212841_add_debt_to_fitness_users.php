<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDebtToFitnessUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fitness_users', function (Blueprint $table) {
            //
            $table->bigInteger('debt')->after('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fitness_users', function (Blueprint $table) {
            //
            $table->dropColumn('debt');
        });
    }
}
