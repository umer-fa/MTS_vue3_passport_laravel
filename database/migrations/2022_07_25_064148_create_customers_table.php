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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();//`customer_group_id`,`user_id`,`name`,`company_name`,`email`,`phone_number`,`tax_no`,`address`,`city`,`state`,`postal_code`,`country`,`deposit`,`expense`,`is_active`,`bus_id`,`location_id`
            $table->integer('customer_group_id');
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string("company_name")->nullable();
            $table->string("email")->unique()->nullable();
            $table->integer("phone_number")->unique();
            $table->string("tax_no")->unique()->nullable();
            $table->string("address");
            $table->string("city");
            $table->string("state")->nullable();
            $table->string("postal_code")->nullable();
            $table->string("country")->nullable();
            $table->double("deposit")->nullable();
            $table->double("expense")->nullable();
            $table->tinyInteger("is_active")->default(1)->nullable();
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
        Schema::dropIfExists('customers');
    }
};
