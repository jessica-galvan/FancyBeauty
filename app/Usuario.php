<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    public $table = 'usuarios';
    public $guarded = [];

    public function perfil(){
        return $this->hasOne('App\Perfil', 'perfil_id');
    }
}
