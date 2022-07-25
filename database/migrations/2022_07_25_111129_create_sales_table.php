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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();//`reference_no``user_id``cash_register_id``customer_id``warehouse_id``biller_id``item``total_qty``total_discount``total_tax`
            //`total_price``grand_total``order_tax_rate``order_tax``order_discount``coupon_id``coupon_discount``shipping_cost``sale_status``payment_status`
            //`document``paid_amount``sale_note``staff_note``bus_id``location_id`
            $table->string('reference_no');
            $table->integer('user_id');
            $table->integer('cash_register_id');
            $table->integer('customer_id');
            $table->integer('warehouse_id');
            $table->integer('biller_id');
            $table->integer('item');
            $table->double('total_qty');
            $table->double('total_discount');
            $table->double('total_tax');
            $table->double('total_price');
            $table->double('grand_total');
            $table->double('order_tax_rate');
            $table->double('order_tax');
            $table->double('order_discount');
            $table->integer('coupon_id');
            $table->double('coupon_discount');
            $table->double('shipping_cost');
            $table->integer('sale_status')->default(1);
            $table->integer('payment_status')->default(1);
            $table->string('document');
            $table->double('paid_amount');
            $table->text('sale_note');
            $table->text('staff_note');
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
        Schema::dropIfExists('sales');
    }
};
