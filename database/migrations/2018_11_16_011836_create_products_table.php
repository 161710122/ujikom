<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('stock');
            $table->string('slug');
            $table->unsignedInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('CASCADE');
            $table->unsignedInteger('id_brand');
            $table->foreign('id_brand')->references('id')->on('brands')->onDelete('CASCADE');
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
