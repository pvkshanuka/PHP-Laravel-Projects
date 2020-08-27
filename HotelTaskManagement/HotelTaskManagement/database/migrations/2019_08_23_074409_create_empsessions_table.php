<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpsessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empsessions', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('stime');
            $table->dateTime('etime');
            $table->string('details');
            $table->integer('status');
            $table->integer('emp_id');
            // $table->foreign('emp_id')->references('id')->on('emp');

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
        Schema::dropIfExists('empsessions');
    }
}
