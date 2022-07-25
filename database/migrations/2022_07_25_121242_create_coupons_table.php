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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();//`code``type``amount``minimum_amount``quantity``used``expired_date``user_id``is_active`
            $table->string('code');
            $table->string('type');
            $table->double('amount');
            $table->double('minimum_amount');
            $table->integer('quantity');
            $table->integer('used');
            $table->date('expired_date');
            $table->date('user_id');
            $table->tinyInteger('is_active');
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
        Schema::dropIfExists('coupons');
    }
};
