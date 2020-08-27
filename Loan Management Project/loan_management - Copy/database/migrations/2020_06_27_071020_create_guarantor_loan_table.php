<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuarantorLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('guarantorLoan', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('guarantorId');
		    $table->integer('loanId');
		    $table->dateTime('date')->nullable();
		    $table->integer('status')->nullable();
		
		    $table->index('loanid','fk_guarantor_has_loan_loan1_idx');
		    $table->index('guarantorid','fk_guarantor_has_loan_guarantor1_idx');
		
		    $table->foreign('guarantorid')
		        ->references('guarantorid')->on('guarantor');
		
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
        Schema::dropIfExists('guarantorLoan');
    }
}
