<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('branch_id')->unsigned()->nullable();
            $table->bigInteger('supplier_id')->unsigned()->nullable();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->string('reference');
            $table->string('invoice_no');
            $table->string('invoice_type');
            $table->string('type');
            $table->date('issued_date');
            $table->date('due_date');
            $table->date('closing_date')->nullable();
            $table->double('total_qty');
            $table->double('total_items');
            $table->double('total_tax_amount');
            $table->double('total_discount_amount');
            $table->double('total_balance');
            $table->double('total_due');
            $table->double('outstanding_balance');
            $table->double('subtotal');
            $table->double('total_amount');
            $table->string('remarks')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->actionBy();
            $table->string('status')->default('Un-Active');


            $table->foreign('branch_id')->references('id')->on('branch');
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
        Schema::dropIfExists('purchase_transactions');
    }
}
