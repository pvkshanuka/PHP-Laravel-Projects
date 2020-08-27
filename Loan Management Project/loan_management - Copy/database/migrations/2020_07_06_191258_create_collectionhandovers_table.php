<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionhandoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
		Schema::create('collectionhandover', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('collectionhandoverId');
		    $table->integer('collectorRouteId');
		    $table->integer('employeeId')->nullable();
		    $table->double('amount')->nullable();
		    $table->double('collectedamount')->nullable();
		    $table->dateTime('handoverdate')->nullable();
		    $table->date('collectiondate')->nullable();
		    $table->integer('status')->nullable()->default(1);
		    $table->double('arrershvamount')->nullable();
		
		    $table->index('employeeid','fk_collectorroute_has_employee_employee1_idx');
		    $table->index('collectorrouteid','fk_collectorroute_has_employee_collectorroute1_idx');
		
		    $table->foreign('collectorrouteid')
		        ->references('collectorrouteid')->on('collectorroute');
		
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
		Schema::drop('collectionhandover');

    }
}
