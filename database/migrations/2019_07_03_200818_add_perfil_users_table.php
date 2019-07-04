<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPerfilUsersTable extends Migration{
    public function up(){
        Schema::table('users', function (Blueprint $table) {
            $table->string('foto', 255)->default('user-profile-basic.jpg');
            $table->string('tipoPiel', 20)->nullable();
            $table->string('tonoPiel', 20)->nullable();
            $table->string('provincia', 20)->nullable();
            $table->string('genero', 20)->nullable();
            $table->date('date_of_birth')->nullable();
        });
    }

    public function down(){
      Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('foto');
          $table->dropColumn('tipoPiel');
          $table->dropColumn('tonoPiel');
          $table->dropColumn('provincia');
          $table->dropColumn('genero');
          $table->dropColumn('date_of_birth');
      });
    }
}
