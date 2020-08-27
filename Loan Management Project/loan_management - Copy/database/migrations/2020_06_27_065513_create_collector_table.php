<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('collector', function(Blueprint $table) {
		    $table->engine = 'InnoDBDEFAULT';
		
		    $table->increments('collectorId');
		    $table->integer('employeeId');
		    $table->string('note', 200)->nullable();
		    $table->integer('status')->nullable()->default('1');
		
		    $table->index('employeeid','fk_collector_employee1_idx');
		
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
        Schema::dropIfExists('collector');
    }
}
