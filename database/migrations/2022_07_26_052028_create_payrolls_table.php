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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();//`reference_no``employee_id``account_id``user_id``amount``paying_method``note`
            $table->string('reference_no');
            $table->integer('employee_id');
            $table->integer('account_id');
            $table->integer('user_id');
            $table->double('amount');
            $table->string('paying_method');
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
        Schema::dropIfExists('payrolls');
    }
};
