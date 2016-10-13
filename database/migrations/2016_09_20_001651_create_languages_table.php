<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',8);

            $table->float('tlpc_multiplier');// Multiplier Time Limit Per Case 
            $table->float('ttl_multiplier');// Multiplier Total Time Limit
            $table->float('ml_multiplier'); // Multiplier Memory Limit
            $table->float('sl_multiplier');// Multiplier Size Limit (size of file)
        });
        //Pivot table to manage the relationship many to many between laguages and problems

        Schema::create('language_problem', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->integer('problem_id')->unsigned();

            $table->float('tlpc_multiplier')->nullable();// Multiplier Time Limit Per Case 
            $table->float('ttl_multiplier')->nullable();// Multiplier Total Time Limit
            $table->float('ml_multiplier')->nullable(); // Multiplier Memory Limit
            $table->float('sl_multiplier')->nullable();

            $table->integer('tlpc')->unsigned()->nullable();// Time Limit Per Case
            $table->integer('ttl')->unsigned()->nullable();// Total Time Limit
            $table->integer('ml')->unsigned()->nullable();//Memory Limit
            $table->integer('sl')->unsigned()->nullable();// Size Limit (size of file)

            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('problem_id')->references('id')->on('problems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_problem');
        Schema::dropIfExists('languages');
    }
}
