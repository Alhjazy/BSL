<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sales_transactions_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->double('qty');
            $table->double('price');
            $table->double('tax_value');
            $table->double('discount')->nullable();
            $table->double('total')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->actionBy();
            $table->string('status')->default('Un-Active');

            $table->foreign('sales_transactions_id')->references('id')->on('sales_transactions');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('sales_transaction_details');
    }
}
