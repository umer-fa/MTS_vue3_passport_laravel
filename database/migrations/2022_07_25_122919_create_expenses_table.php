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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();//`reference_no``expense_category_id``warehouse_id``account_id``user_id``cash_register_id``amount``note`
            $table->string('reference_no');
            $table->integer('expense_category_id');
            $table->integer('warehouse_id');
            $table->integer('account_id');
            $table->integer('user_id');
            $table->integer('cash_register_id')->nullable();
            $table->double('amount');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};
