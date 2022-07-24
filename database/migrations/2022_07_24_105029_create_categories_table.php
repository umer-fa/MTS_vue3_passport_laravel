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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();//`name`,`image`,`parent_id`,`is_active`,`bus_id`,`location_id`
            $table->string("name");
            $table->string("image");
            $table->integer('parent_id');
            $table->tinyInteger("is_active")->default(1);
            $table->integer("bus_id");
            $table->integer("localtion_id");
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
        Schema::dropIfExists('categories');
    }
};
