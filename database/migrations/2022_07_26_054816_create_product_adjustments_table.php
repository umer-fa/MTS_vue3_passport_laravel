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
        Schema::create('product_adjustments', function (Blueprint $table) {
            $table->id();//`adjustment_id``product_id``qty``action`
            $table->integer('adjustment_id');
            $table->integer('product_id');
            $table->double('qty');
            $table->string('action');
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
        Schema::dropIfExists('product_adjustments');
    }
};
