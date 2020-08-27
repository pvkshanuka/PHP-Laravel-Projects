<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectorRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('collectorRoute', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->integer('routeId');
		    $table->date('datec')->nullable();
		    $table->integer('status')->nullable();
		    $table->date('end_date')->nullable();
		    $table->integer('idcollector')->unsigned();
		    $table->increments('collectorRouteId');
		
		    $table->index('routeid','fk_route_has_collector_route_idx');
		    $table->index('idcollector','fk_collectorroute_collector1_idx');
		
		    $table->foreign('routeid')
		        ->references('routeid')->on('route');
		
		    $table->foreign('idcollector')
		        ->references('idcollector')->on('collector');
		
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
        Schema::dropIfExists('collectorRoute');
    }
}
