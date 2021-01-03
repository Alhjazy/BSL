<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('purchase_transactions_id')->unsigned();
            $table->bigInteger('supplier_id')->unsigned();
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

            $table->foreign('purchase_transactions_id')->references('id')->on('purchase_transactions');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
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
        Schema::dropIfExists('purchase_payments');
    }
}
