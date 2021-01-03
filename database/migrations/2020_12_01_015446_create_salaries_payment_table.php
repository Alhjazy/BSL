<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries_payment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->date('month')->nullable();
            $table->double('basic')->nullable();
            $table->double('flaying_Tickets')->nullable();
            $table->double('gas')->nullable();
            $table->double('housing')->nullable();
            $table->double('mobile')->nullable();
            $table->double('other_benefits')->nullable();
            $table->double('deductions')->nullable();
            $table->date('transfer_by_bank_at')->nullable();
            $table->date('transfer_by_bank_status')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->actionBy();
            $table->string('status')->default('Un-Active');

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
        Schema::dropIfExists('salaries_payment');
    }
}
