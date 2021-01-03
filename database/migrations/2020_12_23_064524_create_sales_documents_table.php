<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sales_transactions_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->string('type');
            $table->string('name');
            $table->string('file');
            $table->string('remarks')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
            $table->actionBy();

            $table->foreign('sales_transactions_id')->references('id')->on('sales_transactions');
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
        Schema::dropIfExists('sales_documents');
    }
}
