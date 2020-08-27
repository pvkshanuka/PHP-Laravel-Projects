<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('login', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('idlogin');
		    $table->string('name', 45)->nullable();
		    $table->string('username', 45)->nullable();
		    $table->string('password', 300)->nullable();
		    $table->integer('lgstatus')->nullable();
		    $table->string('otp', 45)->nullable();
		
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
        Schema::dropIfExists('login');
    }
}
