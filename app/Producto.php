<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {
    // public $table = 'productos';
    public $guarded = [];

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }
    public function estado(){
        return $this->belongsTo('App\Estado', 'estado_id');
    }
    public function tipoProducto(){
        return $this->belongsTo('App\TipoProducto', 'tipoProducto_id');
    }

}
