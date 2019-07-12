<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
 /*OJO: DEPENDIENDO DE LO QUE NECESITEN CORRER EN LA BASE DE DATOS, ES QUE VAN A COMENTAR Y QUE NO. */
    public function run(){
    /*Basico, cuando esta la base en 0*/
    $this->call(CategoriaSeeder::class);
    $this->call(EstadoSeeder::class);
    $this->call(TipoProductoSeeder::class);
    $this->call(UserSeeder::class);

    /*Si tengo la carpeta de imagenes de los productos originales, podes correr este tambien*/
    $this->call(ProductoSeeder::class);

    /*Sino, acá hay un Factory de productos*/
    // factory(\App\Producto::class, 30)->create();
  }
}
