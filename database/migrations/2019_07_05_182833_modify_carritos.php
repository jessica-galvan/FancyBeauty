<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCarritos extends Migration{

    public function up(){
        Schema::table('carritos', function (Blueprint $table) {
          $table->unsignedBigInteger('producto_id');
          $table->foreign('producto_id')->references('id')->on('productos');
          $table->string('nombre', 100);
          $table->decimal('precio', 15, 2);
          $table->unsignedInteger('cantidad');
          $table->string('foto', 255);
          $table->integer('estado')->default(0);
          $table->unsignedInteger('num_carrito');
        });
    }


    public function down(){
      Schema::table('productos', function (Blueprint $table) {
          $table->dropColumn('producto_id');
          $table->dropColumn('nombre');
          $table->dropColumn('precio');
          $table->dropColumn('cantidad');
          $table->dropColumn('foto');
          $table->dropColumn('estado');
          $table->dropColumn('num_carrito');
        });
    }
}
