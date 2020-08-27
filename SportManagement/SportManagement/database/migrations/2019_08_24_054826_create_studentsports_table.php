<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentsports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('sport_id');
            $table->string('leaderq');
            $table->string('otherq');
            $table->integer('status');

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
        Schema::dropIfExists('studentsports');
    }
}
