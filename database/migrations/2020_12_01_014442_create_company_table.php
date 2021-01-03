<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ar_name');
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('cr_number')->nullable();
            $table->string('tax_number')->nullable();
            $table->timestamps();
            $table->actionBy();
            $table->string('status')->default('Un-Active');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
