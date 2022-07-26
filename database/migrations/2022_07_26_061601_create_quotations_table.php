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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();//`reference_no``user_id``biller_id``supplier_id``customer_id``warehouse_id``item``total_qty``total_discount``total_tax`
            //`total_price``order_tax_rate``order_tax``order_discount``shipping_cost``grand_total``quotation_status``document``note`
            $table->string('reference_no');
            $table->integer('user_id');
            $table->integer('biller_id');
            $table->integer('supplier_id');
            $table->integer('customer_id');
            $table->integer('warehouse_id');
            $table->integer('item');
            $table->double('total_qty');
            $table->double('total_discount');
            $table->double('total_tax');
            $table->double('total_price');
            $table->double('order_tax_rate');
            $table->double('order_tax');
            $table->double('order_discount');
            $table->double('shipping_cost');
            $table->double('grand_total');
            $table->integer('quotation_status');
            $table->string('document');
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
        Schema::dropIfExists('quotations');
    }
};
