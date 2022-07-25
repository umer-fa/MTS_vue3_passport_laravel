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
        Schema::create('units', function (Blueprint $table) {
            $table->id();//`unit_code``unit_name``base_unit``operator``operation_value``is_active``bus_id``location_id`
            $table->string('unit_code');
            $table->string('unit_name');
            $table->integer('base_unit')->nullable();
            $table->string('operator')->nullable();
            $table->double('operation_value')->nullable();
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('units');
    }
};
