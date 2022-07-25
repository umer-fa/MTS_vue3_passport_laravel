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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();//`date``employee_id``user_id``checkin``checkout``status``note`
            $table->date('date');
            $table->integer('employee_id');
            $table->integer('user_id');
            $table->string('checkin');
            $table->string('checkout');
            $table->integer('status')->default(0);
            $table->text('note')->default(0);
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
        Schema::dropIfExists('attendances');
    }
};
