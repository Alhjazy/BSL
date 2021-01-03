<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->bigInteger('role_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('ar_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_image')->nullable();
            $table->string('personal_image')->nullable();
            $table->string('id_number');
            $table->string('id_copy_number');
            $table->date('id_release_date');
            $table->date('id_expiration_date');
            $table->string('id_type');
            $table->string('nationality');
            $table->string('religion');
            $table->string('passport_number')->nullable();
            $table->string('passport_visa_number')->nullable();
            $table->date('passport_release_date')->nullable();
            $table->date('passport_expiration_date')->nullable();
            $table->string('business_license_number')->nullable();
            $table->date('business_license_release_date')->nullable();
            $table->date('business_license_expiration_date')->nullable();
            $table->string('bank_account_name');
            $table->string('bank_account_number');
            $table->string('bank_account_iban');
            $table->date('join_at');
            $table->date('last_day_at');
            $table->string('id_file');
            $table->string('passport_file');
            $table->string('contract_file');
            $table->rememberToken();
            $table->actionBy();
            $table->timestamps();
            $table->string('status')->default('Un-Active');

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('role_id')->references('id')->on('employee_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
