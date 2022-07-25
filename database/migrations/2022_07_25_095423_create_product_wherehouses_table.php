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
        Schema::create('product_wherehouses', function (Blueprint $table) {
            $table->id();//`product_id``variant_id``warehouse_id``qty``price``bus_id``location_id`
            $table->integer('product_id');
            $table->integer('variant_id')->nullable();
            $table->integer('warehouse_id');
            $table->double('qty');
            $table->double('price')->nullable();
            $table->integer('bus_id');
            $table->integer('location_id');
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
        Schema::dropIfExists('product_wherehouses');
    }
};
