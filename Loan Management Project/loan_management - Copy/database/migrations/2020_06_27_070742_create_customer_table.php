<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('customer', function(Blueprint $table) {
		    $table->engine = 'InnoDBDEFAULT';
		
		    $table->increments('customerId');
		    $table->string('customerNo', 45)->nullable();
		    $table->string('nic', 20)->nullable();
		    $table->string('name', 45)->nullable()->default(null);
		    $table->string('img', 100)->nullable();
		    $table->string('nickname', 45)->nullable()->default(null);
		    $table->string('pno', 15)->nullable()->default(null);
		    $table->string('pno2', 20)->nullable()->default(null);
		    $table->integer('addressId');
		    $table->string('email', 50)->nullable();
		    $table->integer('routeId');
		    $table->string('note', 500)->nullable();
		    $table->integer('customerLevelId');
		    $table->integer('status')->nullable()->default('1');
		
		    $table->index('addressid','fk_customer_address1_idx');
		    $table->index('routeid','fk_customer_route1_idx');
		    $table->index('customerlevelid','fk_customer_customerlevel1_idx');
		
		    $table->foreign('addressid')
		        ->references('addressid')->on('address');
		
		    $table->foreign('routeid')
		        ->references('routeid')->on('route');
		
		    $table->foreign('customerlevelid')
		        ->references('customerlevelid')->on('customerlevel');
		
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
        Schema::dropIfExists('customer');
    }
}
