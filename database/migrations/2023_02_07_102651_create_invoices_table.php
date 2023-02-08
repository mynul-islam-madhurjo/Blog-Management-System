<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->mediumText('customer_billing_address');
            $table->mediumText('customer_billing_address_l1');
            $table->mediumText('customer_billing_address_l2');
            $table->mediumText('customer_billing_address_l3');
            $table->mediumText('customer_billing_address_l4');
            $table->string('buyer_id');
            $table->string('platform_order_number');
            $table->string('order_status_esm');
            $table->string('package_status');
            $table->string('tracking_number');
            $table->string('total_order_value');
            $table->string('package_id');
            $table->string('mode_of_payment');
            $table->string('order_creation_date');
            $table->string('rts_date');
            $table->string('delivery_date');
            $table->string('cash_payment_fee_after_tax');
            $table->string('cash_payment_fee_tax_amount');
            $table->string('cash_payment_fee_before_tax');
            $table->string('cash_payment_fee_discount_amount');
            $table->string('venture');
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
        Schema::dropIfExists('invoices');
    }
}
