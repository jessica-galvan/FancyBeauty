<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model{
    public $table = 'perfiles';

    public function usuario(){
        return $this->hasOne('App\User', 'user_id');
    }
}
