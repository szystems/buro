<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('currency');
            $table->string('currency_iso');
            $table->string('currency_simbol');
            $table->tinyInteger('tax_status')->default('0');
            $table->integer('tax')->default('0');
            $table->tinyInteger('paypal')->default('0');
            $table->tinyInteger('dbt')->default('0');
            $table->decimal('shipping', $precision = 11, $scale = 2)->default('0.00');
            $table->mediumText('shipping_description')->nullable();
            $table->string('email')->nullable();
            $table->integer('store')->default('0');
            $table->integer('shopify')->default('0');
            $table->string('shopify_link', 500)->nullable();
            $table->integer('amazon')->default('0');
            $table->string('amazon_link', 500)->nullable();
            $table->tinyInteger('advertisement')->default('0');
            $table->string('advertisement_link', 500)->nullable();
            $table->string('advertisement_image', 200)->nullable();
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
        Schema::dropIfExists('configs');
    }
}
