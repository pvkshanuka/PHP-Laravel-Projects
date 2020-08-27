<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('installmentPay', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
            $table->increments('installmentPayId');
            $table->double('amount')->nullable();
		    $table->date('datec')->nullable();
		    $table->integer('status')->nullable();
		    $table->integer('installmentId');
		    $table->integer('employeeId');
		
		    $table->index('installmentid','fk_installmentpay_installment1_idx');
		    $table->index('employeeid','fk_installmentpay_employee1_idx');
		
		    $table->foreign('installmentid')
		        ->references('installmentid')->on('installment');
		
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
        Schema::dropIfExists('installmentPay');
    }
}
