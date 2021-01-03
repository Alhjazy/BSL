<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('purchase_transactions_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('suppliers_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->double('qty');
            $table->double('price');
            $table->double('tax_value');
            $table->double('discount_value')->nullable();
            $table->double('total')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->actionBy();
            $table->string('status')->default('Un-Active');

            $table->foreign('purchase_transactions_id')->references('id')->on('purchase_transactions');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('suppliers_id')->references('id')->on('suppliers');
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
        Schema::dropIfExists('purchase_transaction_details');
    }
}
