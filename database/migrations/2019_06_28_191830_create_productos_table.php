<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration{

    public function up(){
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->string('foto', 255);
            $table->decimal('precio', 15, 2);
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->unsignedBigInteger('tipoProducto_id');
            $table->foreign('tipoProducto_id')->references('id')->on('tipoProductos');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('productos');
    }
}
