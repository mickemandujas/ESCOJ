<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('author');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->mediumText('description');
            $table->string('acces_type',2); // Indicates whether the contest is private or not
            $table->integer('penalization'); // penalization time 
            $table->integer('frozen_time'); //  time during the score is frozen
            $table->string('offcontest',2); // Indicates whether the contest is in real time or not
            $table->dateTime('offcontes_start_date');
            $table->dateTime('offcontest_end_date');
            $table->integer('offcontest_penalization'); // penalization time 
            $table->timestamps();
        });

        //Pivot table to manage the relationship many to many between contests and problems

        Schema::create('contest_problem', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contest_id')->unsigned();
            $table->integer('problem_id')->unsigned();

            $table->foreign('contest_id')->references('id')->on('contests');
            $table->foreign('problem_id')->references('id')->on('problems');
        });

        //Pivot table to manage the relationship many to many between contests and users
        Schema::create('contest_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contest_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('contest_id')->references('id')->on('contests');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_user');
        Schema::dropIfExists('contest_problem');
        Schema::dropIfExists('contests');
    }
}