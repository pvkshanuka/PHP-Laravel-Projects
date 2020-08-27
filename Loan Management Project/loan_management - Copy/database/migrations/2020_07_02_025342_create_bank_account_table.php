<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('bankAccount', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('accountId');
		    $table->string('accName', 45)->nullable();
		    $table->string('accNumber', 45)->nullable();
		    $table->integer('status')->nullable();
		    $table->integer('employeeId');
		
		    $table->index('employeeid','fk_bankaccount_employee1_idx');
		
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
        Schema::dropIfExists('bankAccount');
    }
}
