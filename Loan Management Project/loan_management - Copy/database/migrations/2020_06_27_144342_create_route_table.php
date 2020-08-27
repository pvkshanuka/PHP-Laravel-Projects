<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('route', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('routeId');
		    $table->string('routename', 50)->nullable();
		    $table->string('details', 200)->nullable();
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
        Schema::dropIfExists('route');
    }
}
