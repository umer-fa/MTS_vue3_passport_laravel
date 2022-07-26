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
        Schema::create('purchase_product_returns', function (Blueprint $table) {
            $table->id();//`return_id``variant_id``qty``purchase_unit_id``net_unit_cost``discount``tax_rate``tax``total`
            $table->integer('return_id');
            $table->integer('product_id');
            $table->integer('variant_id');
            $table->double('qty');
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
        Schema::dropIfExists('purchase_product_returns');
    }
};
