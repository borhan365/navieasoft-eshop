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
            $table->integer('user_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('sku')->nullable();;
            $table->string('barcode')->nullable();;
            $table->longtext('description')->nullable();;
            $table->longtext('specification')->nullable();;
            $table->string('image');
            $table->string('max_order_qty')->nullable();;
            $table->string('min_order_qty')->nullable();;
            $table->string('buying_price')->nullable();
            $table->string('market_price')->nullable();
            $table->string('sell_price');
            $table->integer('qty');
            $table->text('note');
            $table->integer('status');
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
