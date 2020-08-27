<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('installment', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
            $table->increments('installmentId');
            $table->double('amount')->nullable();
            $table->double('paidAmount')->nullable();
		    $table->date('datec')->nullable();
		    $table->integer('status')->nullable();
		    $table->integer('loanId');
		    
		    $table->primary('installmentId');
		
		    $table->index('loanid','fk_installment_loan2_idx');
		
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
        Schema::dropIfExists('installment');
    }
}
