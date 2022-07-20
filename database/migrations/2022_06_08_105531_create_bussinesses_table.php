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
        Schema::create('bussinesses', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unique();
            $table->string("bus_name")->unique();
            $table->string("logo")->nullable();
            $table->tinyInteger("status")->default(0);
            $table->tinyInteger("is_setup")->default(0);
            $table->tinyInteger("is_subscribed")->default(0);
            $table->integer("subscription_expiry")->nullable();
            $table->tinyInteger("is_recuring")->default(0);
            $table->integer("store_limit")->default(1);
            $table->integer("user_limit")->default(3);
            $table->integer("package")->default(0);
            $table->integer("last_bil_ref")->nullable();
            $table->string("referred_by")->nullable()->collation('utf8_unicode_ci');
            $table->decimal("montly_bill",16,2)->default(0.00);
            $table->string("timezone")->nullable()->default(null)->collation('utf8_unicode_ci');
            $table->integer("assigned_to")->default(1);
            $table->tinyInteger("charge_failed")->default(0);
            $table->tinyInteger("billing_cycle")->default(1)->comment("1= Monthly , 2= Yearly");
            $table->integer("training_by")->nullable()->default(null);
            $table->string("training_status")->nullable()->default(null)->collation('utf8_unicode_ci');
            $table->date('training_delivered_date')->nullable();
            $table->integer('customer_priority')->default(1)->comment('1 High 2 Medium 3 Low');
            $table->integer('mts_status')->default(0)->comment('0=>Not-MTS,1=>MTS,2=>MTS-Migration,3=>MTS-Data-Seeding');
            $table->tinyInteger('region')->default(0)->comment('0 for global 1 for asia');
            $table->tinyInteger('approved')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bussinesses');
    }
};
