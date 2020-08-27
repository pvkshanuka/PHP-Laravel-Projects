<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('chequeTransactions', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('transactionsId');
		    $table->string('checkNo', 45)->nullable();
		    $table->dateTime('issueDate')->nullable();
		    $table->dateTime('realizeDate')->nullable();
		    $table->string('description', 225)->nullable();
		    $table->integer('status')->nullable();
			$table->integer('marked')->nullable();
			$table->double('amount')->nullable();
		    $table->integer('accountId');
		    $table->integer('loanId')->nullable();
		    $table->integer('employeeId');
		
		    $table->index('accountid','fk_chequetransactions_bankaccount1_idx');
		    $table->index('loanid','fk_chequetransactions_loan1_idx');
		    $table->index('employeeid','fk_chequetransactions_employee1_idx');
		
		    $table->foreign('accountid')
		        ->references('accountid')->on('bankaccount');
		
		    $table->foreign('loanid')
		        ->references('loanid')->on('loan');
		
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
        Schema::dropIfExists('chequeTransactions');
    }
}
