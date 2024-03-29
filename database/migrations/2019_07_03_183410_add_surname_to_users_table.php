<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSurnameToUsersTable extends Migration{

    public function up(){
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
        });
    }

    public function down()    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
        });
    }
}
