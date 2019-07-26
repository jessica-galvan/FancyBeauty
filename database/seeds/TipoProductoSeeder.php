<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProductoSeeder extends Seeder{

    public function run(){
        $datos = ['Brocha', 'Gloss', 'Labial', 'Base', 'Polvo Translucido', 'Rubor', 'Paleta de sombras', 'Iluminador', 'Polvo Bronceador', 'Bronceador en crema', 'Iluminador Plateado', "Prebase Hidratante", "Delineador Liquido Negro Matte", "Delinedor Liquido Rosa", "Duo de Sombras", "esponja", "Espejo Pequeño", "Brocha de Viaje", "Labial Matte Violeta", "Labial Matte Salmón"];

        foreach ($datos as $dato){
          DB::table('tipoProductos')->insert([
              'nombre'=> $dato,
          ]);
        }
    }
}
