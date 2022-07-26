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
        Schema::create('payment_with_credit_cards', function (Blueprint $table) {
            $table->id();//`payment_id``customer_id``customer_stripe_id``charge_id`
            $table->integer('payment_id');
            $table->integer('customer_id')->nullable();
            $table->integer('customer_stripe_id')->nullable();
            $table->integer('charge_id');
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
        Schema::dropIfExists('payment_with_credit_cards');
    }
};
