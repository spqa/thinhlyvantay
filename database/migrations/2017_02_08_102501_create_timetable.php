<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetable',function (Blueprint $table){
            $table->integer('so_tiet')->nullable();
            $table->string('thu2')->nullable();
            $table->string('thu3')->nullable();
            $table->string('thu4')->nullable();
            $table->string('thu5')->nullable();
            $table->string('thu6')->nullable();
            $table->string('thu7')->nullable();
            $table->integer('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
