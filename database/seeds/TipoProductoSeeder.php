<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProductoSeeder extends Seeder{

    public function run(){
        $datos = ['Brocha', 'Gloss', 'Labial', 'Base', 'Polvo Translucido', 'Rubor', 'Sombras', 'Iluminador', 'Bronceador', "Delinedor", "Esponja", "Espejo"];

        foreach ($datos as $dato){
          DB::table('tipoProductos')->insert([
              'nombre'=> $dato,
          ]);
        }
    }
}
