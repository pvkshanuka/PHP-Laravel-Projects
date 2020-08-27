<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterstLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('interstLoan', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('interstLoanid');
		    $table->integer('value')->nullable();
		    $table->integer('status')->nullable();
		
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
        Schema::dropIfExists('interstLoan');
    }
}
