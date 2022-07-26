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
        Schema::create('stock_counts', function (Blueprint $table) {
            $table->id();//`reference_no``warehouse_id``category_id``brand_id``user_id``type``initial_file``final_file``note``is_adjusted`
            $table->string('reference_no');
            $table->integer('warehouse_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('user_id');
            $table->string('type');
            $table->string('initial_file');
            $table->string('final_file');
            $table->text('note');
            $table->tinyInteger('is_adjusted')->default(0);
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
        Schema::dropIfExists('stock_counts');
    }
};
