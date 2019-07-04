<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoProductosTable extends Migration{

    public function up(){
        Schema::create('tipoProductos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100);
            $table->timestamps();
        });
    }
    function down(){
        Schema::dropIfExists('tipo_productos');
    }
}
