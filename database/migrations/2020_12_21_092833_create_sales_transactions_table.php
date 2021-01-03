<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('branch_id')->unsigned()->nullable();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->string('reference');
            $table->date('issued_date');
            $table->date('due_date');
            $table->date('closing_date');
            $table->string('type');
            $table->string('tax_type');
            $table->double('total_items');
            $table->double('total_qty');
            $table->double('subtotal');
            $table->double('total_tax_amount');
            $table->double('total_discount_amount');
            $table->double('total_balance');
            $table->double('total_due');
            $table->double('outstanding_balance');
            $table->double('total_amount');
            $table->string('remarks')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->actionBy();
            $table->string('status')->default('Un-Active');


            $table->foreign('branch_id')->references('id')->on('branch');
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
        Schema::dropIfExists('sales_transactions');
    }
}
