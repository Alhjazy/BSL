<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('branch_id')->unsigned()->nullable();
            $table->bigInteger('to_branch_id')->unsigned()->nullable();
            $table->string('type');
            $table->string('tax_type');
            $table->double('total_qty');
            $table->double('subtotal');
            $table->double('total_tax_value');
            $table->double('discount');
            $table->double('total');
            $table->string('remarks')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->actionBy();
            $table->string('status')->default('Un-Active');


            $table->foreign('branch_id')->references('id')->on('branch');
            $table->foreign('to_branch_id')->references('id')->on('branch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_transactions');
    }
}
