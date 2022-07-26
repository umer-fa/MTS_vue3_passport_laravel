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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();//`site_title``site_logo``currency``staff_access``date_format``developed_by``invoice_format``state``theme``currency_position`
            $table->string('site_title');
            $table->string('site_logo')->nullable();
            $table->string('currency');
            $table->string('staff_access');
            $table->string('date_format');
            $table->string('developed_by');
            $table->string('invoice_format');
            $table->integer('state');
            $table->string('theme');
            $table->timestamps();
            $table->string('currency_position');
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
        Schema::dropIfExists('general_settings');
    }
};
