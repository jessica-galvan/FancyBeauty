<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model {
    public $table = 'carritos';
    public $guarded = [];

    public function usuario(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function subtotal(){
        return $this->cantidad * $this->precio;
    }

    function getOrderNoAttribute() {
        return str_pad($this->num_carrito,4,'0',STR_PAD_LEFT);
    }
}
