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
        Schema::create('product_quotations', function (Blueprint $table) {
            $table->id();//`quotation_id``product_id``variant_id``qty``sale_unit_id``net_unit_price``discount``tax_rate``tax``total`
            $table->integer('purchase_id');
            $table->integer('product_id');
            $table->integer('variant_id')->nullable();
            $table->double('qty');
            $table->integer('sale_unit_id');
            $table->double('net_unit_price');
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
        Schema::dropIfExists('product_quotations');
    }
};
