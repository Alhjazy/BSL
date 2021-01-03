<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTransactionsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_transactions_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stock_transactions_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->double('qty');
            $table->double('price');
            $table->double('tax_value');
            $table->double('discount')->nullable();
            $table->double('total')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->actionBy();
            $table->string('status')->default('Un-Active');

            $table->foreign('stock_transactions_id')->references('id')->on('stock_transactions');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_transactions_details');
    }
}
