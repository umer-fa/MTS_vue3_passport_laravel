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
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->id();//`purchase_id``product_id``variant_id``qty``recieved``purchase_unit_id``net_unit_cost``discount``tax_rate``tax``total`
            $table->integer('purchase_id');
            $table->integer('product_id');
            $table->integer('variant_id')->nullable();
            $table->double('qty');
            $table->double('recieved');
            $table->integer('purchase_unit_id');
            $table->double('net_unit_cost');
            $table->double('discount');
            $table->double('tax_rate');
            $table->double('tax');
            $table->double('total');
            $table->timestamps();
            $table->integer('bus_id');
            $table->integer('location_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_purchases');
    }
};
