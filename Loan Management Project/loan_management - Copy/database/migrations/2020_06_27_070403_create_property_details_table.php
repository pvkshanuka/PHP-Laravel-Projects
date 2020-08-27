<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('propertyDetails', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('propertyDetailsId');
		    $table->integer('loanId');
		    $table->string('details', 200)->nullable();
		    $table->string('documents', 100)->nullable();
		    $table->integer('status')->nullable();
		
		    $table->index('loanid','fk_propertydetails_loan1_idx');
		
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
        Schema::dropIfExists('propertyDetails');
    }
}
