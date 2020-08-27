<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('interestPay', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->dateTime('datec')->nullable();
		    $table->integer('employeeId');
		    $table->integer('status')->nullable();
		    
		    $table->primary('interestPayId');
		
		    $table->index('interestid','fk_interestpay_interest1_idx');
		    $table->index('employeeid','fk_interestpay_employee1_idx');
            $table->double('paidAmount')->nullable();
		    $table->foreign('interestid')
		        ->references('interestid')->on('interest');
		
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
        Schema::dropIfExists('interestPay');
    }
}
