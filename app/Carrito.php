<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model {
    public $table = 'carritos';
    public $guarded = [];

    public function usuario(){
        return $this->belongsTo('App\User', 'user_id');
    }

    // public function getTotal($carrito){
    //   $total = 0;
    //   foreach($carrito as $item){
    //       $total = $total + ($item['precio']*$item['cantidad']);
    //   }
    //
    //   return $total;
    // }
    // public function producto(){
    //     return $this->belongsTo('App\Producto', 'producto_id');
    // }
}
