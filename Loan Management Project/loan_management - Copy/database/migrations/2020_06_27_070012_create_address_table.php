<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('address', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('addressId');
		    $table->string('line1', 50)->nullable();
		    $table->string('line2', 50)->nullable();
		    $table->string('city', 20)->nullable();
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
        Schema::dropIfExists('address');
    }
}
