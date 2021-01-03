<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('purchase_transactions_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->string('type');
            $table->string('name');
            $table->string('file');
            $table->string('remarks')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
            $table->actionBy();

            $table->foreign('purchase_transactions_id')->references('id')->on('purchase_transactions');
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
        Schema::dropIfExists('purchase_documents');
    }
}
