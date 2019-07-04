<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder{

    public function run(){
        $datos = ['Rostro', 'Labios', 'Ojos', 'Accesorios'];

        foreach ($datos as $dato){
          DB::table('categorias')->insert([
              'nombre'=> $dato,
          ]);
        }
    }
}
