<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuarantorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('guarantor', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('guarantorId');
		    $table->string('name', 100)->nullable();
		    $table->string('nic', 20)->nullable();
		    $table->string('pno', 20)->nullable();
		    $table->string('pno2', 20)->nullable();
		    $table->integer('addressId');
		    $table->string('img', 100)->nullable();
		    $table->string('details', 500)->nullable();
		    $table->string('status', 1)->nullable();
		
		    $table->index('addressid','fk_guarantor_address1_idx');
		
		    $table->foreign('addressid')
		        ->references('addressid')->on('address');
		
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
        Schema::dropIfExists('guarantor');
    }
}
