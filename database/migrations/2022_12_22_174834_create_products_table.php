<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->bigInteger('cate_id');
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('original_price')->default('0.00');
            $table->string('selling_price')->default('0.00');
            $table->string('image')->nullable();
            $table->integer('qty')->default('0');
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('trending')->default('0');
            $table->tinyInteger('discount')->default('0');
            $table->string('shopify_link', 500)->nullable();
            $table->string('amazon_link', 500)->nullable();
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
}
