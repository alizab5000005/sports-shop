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
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('name');
            $table->string('image');
            $table->string('original_price');
            $table->string('selling_price');
            $table->integer('qty');
            $table->text('short_desc');
            $table->text('long_desc');
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('featured')->default('0');
            $table->tinyInteger('popular')->default('0');
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
