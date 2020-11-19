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
            $table->string('name');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('prosubcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('buying_price')->nullable();
            $table->string('market_price')->nullable();
            $table->string('sell_price');
            $table->integer('qty');
            $table->string('image');
            $table->text('note');
            $table->longtext('description');
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
