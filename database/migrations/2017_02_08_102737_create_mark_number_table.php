<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects',function (Blueprint $table){
            $table->integer('numberOfM')->nullable();
            $table->integer('numberOf15P')->nullable();
            $table->integer('numberOf45P')->nullable();
            $table->integer('numberOfHK')->nullable();
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
