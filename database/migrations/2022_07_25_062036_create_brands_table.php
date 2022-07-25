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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();//`title`,`image`,`is_active`,`bus_id`,`location_id`
            $table->string("title");
            $table->string("image")->nullable();
            $table->tinyInteger("is_active")->default(1);
            $table->timestamps();
            $table->integer("bus_id")->default(0);
            $table->integer("location_id")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
};
