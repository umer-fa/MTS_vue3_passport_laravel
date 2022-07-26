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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();//`product_id``variant_id``position``item_code``additional_price``qty`
            $table->integer('product_id');
            $table->integer('variant_id');
            $table->integer('position');
            $table->string('item_code');
            $table->double('additional_price')->nullable();
            $table->double('qty');
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
        Schema::dropIfExists('product_variants');
    }
};
