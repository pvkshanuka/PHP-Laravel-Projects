<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('loanPay', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
            $table->increments('loanPayId');
            $table->double('amount')->nullable();
		    $table->dateTime('datec')->nullable();
		    $table->integer('employeeId');
		    $table->integer('status')->nullable();
		    $table->integer('loanId');
		
		    $table->index('employeeid','fk_loanpay_employee1_idx');
		    $table->index('loanid','fk_loanpay_loan2_idx');
		
		    $table->foreign('employeeid')
		        ->references('employeeid')->on('employee');
		
		    $table->foreign('loanid')
		        ->references('loanid')->on('loan');
		
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
        Schema::dropIfExists('loanPay');
    }
}
