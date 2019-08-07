<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model{
    public $table = 'tipoproductos';
    public $fillable = [];

    public function producto(){
        return $this->belongsTo('App\Producto', 'tipoProducto_id');
    }
}
