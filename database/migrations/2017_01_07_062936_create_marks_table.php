<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->index();
            $table->integer('subject_id')->index();
            $table->float('H1M1')->nullable();
            $table->float('H1M2')->nullable();
            $table->float('H1M3')->nullable();
            $table->float('H1M4')->nullable();
            $table->float('H1G1')->nullable();
            $table->float('H1G2')->nullable();
            $table->float('H1G3')->nullable();
            $table->float('H1G4')->nullable();
            $table->float('H2G1')->nullable();
            $table->float('H2G2')->nullable();
            $table->float('HK')->nullable();
            $table->float('TBM')->nullable();
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
        Schema::dropIfExists('marks');
    }
}
