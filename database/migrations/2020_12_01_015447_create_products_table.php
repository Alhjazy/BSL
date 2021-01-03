<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('ar_name');
            $table->string('barcode');
            $table->string('sku');
            $table->double('price');
            $table->string('tax_type');
            $table->double('tax_percentage');
            $table->string('is_discounted')->default('no');
            $table->double('discount_percentage')->default('0');
            $table->double('discount_value')->default('0');
            $table->string('type');
            $table->string('unit_type');
            $table->text('specification')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->actionBy();
            $table->string('status')->default('Un-Active');

            $table->foreign('category_id')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
