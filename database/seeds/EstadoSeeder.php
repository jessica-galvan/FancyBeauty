<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder{

    public function run(){
      $datos = ['Popular', 'Nuevo', 'Sin Stock', 'Oferta', 'Ninguno'];

      foreach ($datos as $dato){
        DB::table('estados')->insert([
            'nombre'=> $dato,
        ]);
      }
    }
}
