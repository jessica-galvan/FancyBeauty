<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model{
    public $fillable = [];

    public function producto(){
        return $this->hasMany('App\Producto', 'estado_id');
    }
}
