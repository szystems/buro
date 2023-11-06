<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zipcode');
            $table->decimal('total_tax', $precision = 11, $scale = 2)->default('0.00');
            $table->decimal('shipping', $precision = 11, $scale = 2)->default('0.00');
            $table->decimal('total_price', $precision = 11, $scale = 2)->default('0.00');
            $table->string('payment_mode')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('note')->nullable();
            $table->string('status')->default('0');
            $table->string('tracking_no');
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
        Schema::dropIfExists('orders');
    }
}
