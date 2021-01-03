<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sales_transactions_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->string('reference');
            $table->string('payment_account');
            $table->string('payment_method');
            $table->double('amount');
            $table->double('outstanding_balance');
            $table->date('date');
            $table->string('description')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->default('Un-Active');
            $table->timestamps();
            $table->actionBy();

            $table->foreign('sales_transactions_id')->references('id')->on('sales_transactions');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_payments');
    }
}
