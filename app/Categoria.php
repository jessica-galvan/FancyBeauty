<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model{
    public $fillable = [];

    public function producto(){
        return $this->hasMany('App\Producto', 'categoria_id');
    }
}
