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
        Schema::table('users', function (Blueprint $table) {
//            $table->string('fullname')->after('id')->nullable();
            $table->string('authkey')->after('email')->nullable();
            $table->string('username')->unique();
            $table->string('salt')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer("bussiness_id")->default(0);
            $table->integer("role_id")->default(0);
            $table->integer("store_id")->default(0);
            $table->string("image")->nullable();
            $table->string("zip")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("language")->nullable();
            $table->string("accesspin")->nullable();
            $table->tinyInteger("created_by")->default(0);
            $table->text("store_access")->nullable();
            $table->tinyInteger("is_delete")->default(0);
            $table->tinyInteger("pay_type")->default(0);
            $table->tinyInteger("pay_schedule")->default(0);
            $table->tinyInteger("profile_done")->default(0);
            $table->decimal("salary")->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
