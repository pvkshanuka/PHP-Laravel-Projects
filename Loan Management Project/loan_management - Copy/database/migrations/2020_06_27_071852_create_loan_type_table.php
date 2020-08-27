<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('loanType', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('loanTypeId');
		    $table->string('name', 45)->nullable();
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
        Schema::dropIfExists('loanType');
    }
}
