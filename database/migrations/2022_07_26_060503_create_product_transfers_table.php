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
        Schema::create('product_transfers', function (Blueprint $table) {
            $table->id();
            $table->integer('transfer_id');
            $table->integer('product_id');
            $table->integer('variant_id')->nullable();
            $table->double('qty');
            $table->integer('purchase_unit_id');
            $table->double('net_unit_cost');
//            $table->double('discount');
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
        Schema::dropIfExists('product_transfers');
    }
};
