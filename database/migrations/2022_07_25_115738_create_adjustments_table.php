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
        Schema::create('adjustments', function (Blueprint $table) {
            $table->id();//`reference_no``warehouse_id``document``total_qty``item``note`
            $table->string('reference_no');
            $table->integer('warehouse_id');
            $table->text('document');
            $table->double('total_qty');
            $table->integer('item');
            $table->text('note');
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
        Schema::dropIfExists('adjustments');
    }
};
