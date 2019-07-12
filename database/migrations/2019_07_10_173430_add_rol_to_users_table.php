<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRolToUsersTable extends Migration{

    public function up(){
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('rol')->default(10);
        });
    }


    public function down(){
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rol');
        });
    }
}
