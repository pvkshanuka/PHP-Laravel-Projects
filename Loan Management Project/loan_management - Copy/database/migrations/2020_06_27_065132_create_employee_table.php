<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
    {
		Schema::create('employee', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('employeeId');
		    $table->integer('employeeTypeId');
		    $table->string('name', 100)->nullable();
		    $table->string('nic', 20)->nullable();
		    $table->string('pno', 20)->nullable();
		    $table->string('email', 50)->nullable();
		    $table->integer('addressId');
		    $table->integer('gender')->nullable();
		    $table->integer('status')->nullable();
		    $table->integer('idlogin')->unsigned();
		
		    $table->index('employeetypeid','fk_employee_employeetype1_idx');
		    $table->index('addressid','fk_employee_address1_idx');
		    $table->index('idlogin','fk_employee_login2_idx');
		
		    $table->foreign('employeetypeid')
		        ->references('employeetypeid')->on('employeetype');
		
		    $table->foreign('addressid')
		        ->references('addressid')->on('address');
		
		    $table->foreign('idlogin')
		        ->references('idlogin')->on('login');
		
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
        Schema::dropIfExists('employee');
    }
}
