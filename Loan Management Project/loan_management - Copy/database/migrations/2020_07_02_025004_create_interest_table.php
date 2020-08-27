<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('interest', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->dateTime('datec')->nullable();
		    $table->integer('status')->nullable();
		    $table->integer('loanId');
            $table->double('amount')->nullable();
            $table->double('paidAmount')->nullable();
		    $table->increments('interestId');
		
		    $table->index('loanid','fk_interest_loan2_idx');
		
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
        Schema::dropIfExists('interest');
    }
}
