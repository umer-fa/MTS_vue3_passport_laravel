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
        Schema::create('gift_cards', function (Blueprint $table) {
            $table->id();//``card_no``amount``expense``customer_id``user_id``expired_date``created_by``is_active`
            $table->string('card_no');
            $table->double('amount');
            $table->double('expense');
            $table->integer('customer_id');
            $table->integer('user_id');
            $table->date('expired_date');
            $table->integer('created_by');
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
        Schema::dropIfExists('gift_cards');
    }
};
