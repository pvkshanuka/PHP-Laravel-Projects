<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('holidays', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('idholidayId');
		    $table->integer('employeeId');
		    $table->string('name', 45)->nullable();
		    $table->dateTime('date')->nullable();
		    $table->integer('status')->nullable();
		
		    $table->index('employeeid','fk_holidays_employee1_idx');
		
		    $table->foreign('employeeid')
		        ->references('employeeid')->on('employee');
		
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
        Schema::dropIfExists('holidays');
    }
}
