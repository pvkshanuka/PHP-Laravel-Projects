<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('loanId');
            $table->string('custom_loanId', 45)->nullable();
            $table->double('amount')->nullable();
            $table->integer('rate')->nullable();
            $table->double('targetIncome')->nullable();
            $table->date('takenDate')->nullable();
            $table->date('endDate')->nullable();
            $table->double('paidAmount')->nullable();
            $table->string('completeStatus', 1)->nullable();
            $table->integer('status')->nullable();
            $table->integer('idcustomer')->unsigned();
            $table->integer('loanTypeId')->nullable();
            $table->text('loancomment')->nullable();

            $table->index('idcustomer', 'fk_loan_customer1_idx');
            $table->index('loantypeid', 'fk_loan_loantype1_idx');

            $table
                ->foreign('idcustomer')
                ->references('idcustomer')
                ->on('customer');

            $table
                ->foreign('loantypeid')
                ->references('loantypeid')
                ->on('loantype');

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
        Schema::dropIfExists('loan');
    }
}
