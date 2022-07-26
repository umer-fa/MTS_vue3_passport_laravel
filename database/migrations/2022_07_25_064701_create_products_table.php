<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('code');
            $table->string('type');
            $table->string('barcode_symbology');
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('unit_id');
            $table->integer('purchase_unit_id');
            $table->integer('sale_unit_id');
            $table->string('cost');
            $table->string('price');
            $table->double('qty');
            $table->double('alert_quantity')->nullable();
            $table->tinyInteger('promotion')->nullable();
            $table->string('promotion_price')->nullable();
            $table->date('starting_date')->nullable();
            $table->date('last_date')->nullable();
            $table->integer('tax_id')->nullable();
            $table->integer('tax_method')->nullable();
            $table->longText('image')->nullable();
            $table->string('file')->nullable();
            $table->tinyInteger('is_diffPrice')->nullable();
            $table->tinyInteger('featured')->default(0)->nullable();
            $table->string('product_list')->nullable();
            $table->string('qty_list')->nullable();
            $table->string('price_list')->nullable();
            $table->text('product_details')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->integer('bus_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->timestamps();
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
};
