<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('checkDetails', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('checkDetailId');
		    $table->integer('loanId')->nullable();
		    $table->string('bankName', 45)->nullable();
		    $table->string('checkNo', 45)->nullable();
		    $table->dateTime('date')->nullable();
            $table->dateTime('realizeDate')->nullable();
            $table->double('returnpanalty')->nullable();
		    $table->string('description', 150)->nullable();
		    $table->integer('status')->nullable();
		
		    $table->index('loanid','fk_checkdetails_loan1_idx');
		
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
        Schema::dropIfExists('checkDetails');
    }
}
