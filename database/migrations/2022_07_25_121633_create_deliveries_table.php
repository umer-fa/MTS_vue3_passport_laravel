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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();//`reference_no``sale_id``user_id``address``delivered_by``recieved_by``file``note``status`
            $table->string('reference_no');
            $table->integer('sale_id');
            $table->integer('user_id');
            $table->text('address');
            $table->string('delivered_by')->nullable();
            $table->string('recieved_by')->nullable();
            $table->string('file')->nullable();
            $table->string('note')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('deliveries');
    }
};
