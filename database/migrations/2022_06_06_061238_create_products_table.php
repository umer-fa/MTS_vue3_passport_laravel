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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('image');
            $table->tinyInteger('make_parent')->default(0)->comment('agar parent ban gya to parent id is ki zero ho jae gi');
            $table->integer('parent_id')->default(0)->comment("is mae aisa ho ga k ek type ki product like lifeboy shampoo ha uska sari shampo choti bari shachy wagaira sb is mae a jae ga. kisi ek ko parent bana k");
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('alarm_on_qty_limit');
            //this for sale part
            $table->tinyInteger('whole_or_purchoon_sale')->default(0)->comment('0 for both 1 for purchone only 2 for whole sale only');
            $table->tinyInteger('unit_id');
            $table->boolean('product_unit_price');
            $table->integer('product_qty')->default(1);
            $table->integer("discount_on_limit_qty")->default(0);
            $table->integer("discount_price")->default(0);
            $table->boolean('bundle_price')->default(0.00);
            $table->integer('bundle_qty')->default(1);
            $table->integer("discount_on_bundle_qty")->default(0);
            $table->integer("discount_bundle_price")->default(0);
            //this for purchase part
            $table->boolean("purchae_rate");
//            $table->integer("bundle_qty")->default(0);

            //single or deal

            //stock of product part
            $table->tinyInteger('publish')->default(1);
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
        Schema::dropIfExists('products');
    }
};
