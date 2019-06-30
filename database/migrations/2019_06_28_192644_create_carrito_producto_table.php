<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('carrito_id');
            $table->foreign('carrito_id')->references('id')->on('carritos');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
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
        Schema::dropIfExists('carrito_producto');
    }
}
