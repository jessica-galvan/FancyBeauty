<?php
/*Me hice un Seeder back up de los productos....*/
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder{

    public function run(){
        $datos = [
          [
            "nombre" => "Brocha 001",
            "descripcion" => "Una linda brocha",
            "precio" => "1000",
            "foto" => "41-Brocha 001.jpg",
            "categoria_id" => "4",
            "estado_id" => "2",
            'tipoproducto_id' => '1',
            'rating' => '4.9',
          ],
          [
            "nombre" => "Rubor Cremoso Rosa",
            "descripcion" => "Lalala",
            "precio" => "1300",
            "foto" => "81-Rubor Cremoso Rosa.jpg",
            "categoria_id" => "1",
            'tipoproducto_id' => '6',
            "estado_id" => "2",
            'rating' => '4.5',
          ],
          [
            "nombre" => "Polvo Translucido",
            "descripcion" => "Probando",
            "precio" => "1400",
            "foto" => "68-Polvo Translucido.jpg",
            "categoria_id" => "1",
            'tipoproducto_id' => '5',
            "estado_id" => "2",
            'rating' => '4.0',
          ],
          [
            "nombre" => "Gloss Coral",
            "descripcion" => "Prueba Descripción",
            "precio" => "1100",
            "foto" => "73-Gloss Coral.jpg",
            "categoria_id" => "2",
            'tipoproducto_id' => '2',
            "estado_id" => "1",
            'rating' => '5.0',
          ],
          [
            "nombre" => "Iluminador Duo",
            "descripcion" => "Lalala",
            "precio" => "1300",
            "foto" => "87-Iluminador Duo.jpg",
            "categoria_id" => "1",
            'tipoproducto_id' => '8',
            "estado_id" => "1",
            'rating' => '3.8',
          ],
          [
            "nombre" => "Labial Matte",
            "descripcion" => "Lasdas564",
            "precio" => "1200",
            "foto" => "95-Labial Matte.jpg",
            "categoria_id" => "2",
            'tipoproducto_id' => '3',
            "estado_id" => "1",
            'rating' => '4.7',
          ],
          [
            "nombre" => "Paleta de Sombras",
            "descripcion" => "L4654asdaalala",
            "precio" => "1800",
            "foto" => "26-Paleta de Sombras.jpg",
            "categoria_id" => "3",
            'tipoproducto_id' => '7',
            "estado_id" => "1",
            'rating' => '4.3',
          ],
          [
            "nombre" => "Base Matte 001",
            "descripcion" => "Prueba",
            "precio" => "1900",
            "foto" => "35-Base Matte 001.png",
            "categoria_id" => "1",
            'tipoproducto_id' => '4',
            "estado_id" => "1",
            'rating' => '3.9',
          ],
          [
            "nombre" => "Labial Matte Azul",
            "descripcion" => "Lalala",
            "precio" => "1200",
            "foto" => "11-Labial Matte Azul.png",
            "categoria_id" => "2",
            'tipoproducto_id' => '3',
            "estado_id" => "2",
            'rating' => '4.1',
          ],
          [
            "nombre" => "Gloss Rosa",
            "descripcion" => "Lalala",
            "precio" => "1100",
            "foto" => "81-Gloss Rosa.png",
            "categoria_id" => "2",
            'tipoproducto_id' => '2',
            "estado_id" => "2",
            'rating' => '5.0',
          ],
        ];

        foreach ($datos as $dato){
          DB::table('productos')->insert([
              'nombre'=> $dato['nombre'],
              'descripcion' => $dato['descripcion'],
              'precio' => $dato['precio'],
              'rating' => $dato ['rating'],
              'estado_id' => $dato['estado_id'],
              'categoria_id' => $dato['categoria_id'],
              'tipoProducto_id' => $dato['tipoproducto_id'],
              'foto' => $dato['foto']
          ]);
        }
    }
}
