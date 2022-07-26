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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();//`payment_reference``user_id``purchase_id``sale_id``cash_register_id``account_id``amount``change``paying_method``payment_note`
            $table->string('payment_reference');
            $table->integer('user_id');
            $table->integer('purchase_id')->nullable();
            $table->integer('sale_id')->nullable();
            $table->integer('cash_register_id')->nullable();
            $table->integer('account_id');
            $table->double('amount');
            $table->double('change');
            $table->string('paying_method');
            $table->text('payment_note')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
