<?php
/*Me hice un Seeder back up de los productos....*/
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder{

    public function run(){
        $datos = [
          [
            "nombre" => "Brocha 001",
            "descripcion" => "La brocha perfecta para aplicar todo tipo de productos en polvo con un terminado natural sin el mayor esfuerzo. Esta creada con pelo sintético, por lo que la convierte en una brocha 100% cruelty free.",
            "precio" => "1000",
            "foto" => "41-Brocha 001.jpg",
            "categoria_id" => "4",
            "estado_id" => "2",
            'tipoproducto_id' => '1',
            'rating' => '4.9',
          ],
          [
            "nombre" => "Rubor Cremoso Rosa",
            "descripcion" => "Un rubor en crema con tonalidad rosa frio que te dará una apariencia saludable y tierna. Con una formula hidratante, es cómodo de llevar a la vez de que trae color y brillo a tu rostro.",
            "precio" => "1300",
            "foto" => "81-Rubor Cremoso Rosa.jpg",
            "categoria_id" => "1",
            'tipoproducto_id' => '6',
            "estado_id" => "2",
            'rating' => '4.5',
          ],
          [
            "nombre" => "Polvo Translúcido",
            "descripcion" => "Nuestro polvo translucido es híper liviano en tu rostro y no se notará en fotos! Este adapta perfectamente a cualquier tono de piel y a su vez, matifica para que los productos líquidos o en crema que hayas aplicado previamente duren mucho más!",
            "precio" => "1400",
            "foto" => "68-Polvo Translucido.jpg",
            "categoria_id" => "1",
            'tipoproducto_id' => '5',
            "estado_id" => "2",
            'rating' => '4.0',
          ],
          [
            "nombre" => "Gloss Coral",
            "descripcion" => "El gloss que todas necesitamos tener, con un brillo explosivo que se ve tan bien como se siente. Con una formula hidratante, nuestro gloss protege tus labios a la vez de que los hace ver perfectos. Por último, tiene un aroma a vainilla irresistible!",
            "precio" => "1100",
            "foto" => "73-Gloss Coral.jpg",
            "categoria_id" => "2",
            'tipoproducto_id' => '2',
            "estado_id" => "1",
            'rating' => '5.0',
          ],
          [
            "nombre" => "Iluminador Dúo",
            "descripcion" => "Dos iluminadores de larga duración que se complementan para lograr el tono perfecto para tu piel, con una fórmula de crema a polvocon un terminado súper metálico para que le des protagonismo a todas las zonas altas de tu rostro como tus pómulos y el arco de las cejas.",
            "precio" => "1300",
            "foto" => "87-Iluminador Duo.jpg",
            "categoria_id" => "1",
            'tipoproducto_id' => '8',
            "estado_id" => "1",
            'rating' => '3.8',
          ],
          [
            "nombre" => "Labial Matte Rojo",
            "descripcion" => "Una formula liviana en los labios, de larga duración y con un terminado matte, en una tonalidad que quedara perfecta en todos los tonos de piel. Un labial con un impactante color y completamente opaco desde la primera aplicación.",
            "precio" => "1200",
            "foto" => "95-Labial Matte.jpg",
            "categoria_id" => "2",
            'tipoproducto_id' => '3',
            "estado_id" => "1",
            'rating' => '4.7',
          ],
          [
            "nombre" => "Paleta de Sombras",
            "descripcion" => "La paleta de sombras, con tonos neutros y cálidos para los maquillajes de diario, y a su vez, con algunos colores más vibrantes para que saques tu artista interior y te inspires en colores! Con una formula fácil de difuminar, lograras cualquier tipo de maquillaje que imagines.",
            "precio" => "1800",
            "foto" => "26-Paleta de Sombras.jpg",
            "categoria_id" => "3",
            'tipoproducto_id' => '7',
            "estado_id" => "1",
            'rating' => '4.3',
          ],
          [
            "nombre" => "Base Matte 001",
            "descripcion" => "Una  base de larga duración, con terminado matte, con cobertura de mediana a alta una gran abanico de tonalidades para todo color de piel. Esta base cambiara la forma en la que se ve tu piel, teniendo una formula libre de aceites y que se mantiene perfecta en climas húmedos. Sin tapar tus poros, esta base se convierte en tu segunda piel para que te veas radiante.",
            "precio" => "1900",
            "foto" => "35-Base Matte 001.png",
            "categoria_id" => "1",
            'tipoproducto_id' => '4',
            "estado_id" => "1",
            'rating' => '3.9',
          ],
          [
            "nombre" => "Labial Matte Azul",
            "descripcion" => "Un labial con la mejor fórmula matte, que dura todo el tiempo que vos necesitás, y con una pigmentación completamente opaca y un color completamente único, que se escapa de la regla de los labiales neutros y rojos.",
            "precio" => "1200",
            "foto" => "11-Labial Matte Azul.png",
            "categoria_id" => "2",
            'tipoproducto_id' => '3',
            "estado_id" => "2",
            'rating' => '4.1',
          ],
          [
            "nombre" => "Gloss Rosa",
            "descripcion" => "El gloss que todas necesitamos tener, con un brillo explosivo que se ve tan bien como se siente. Con una formula hidratante y un color rosa sutil, nuestro gloss protege tus labios a la vez de que los hace ver perfectos. Por último, tiene un aroma a vainilla irresistible!",
            "precio" => "1100",
            "foto" => "81-Gloss Rosa.png",
            "categoria_id" => "2",
            'tipoproducto_id' => '2',
            "estado_id" => "2",
            'rating' => '5.0',
          ],
        /*Productos Nuevos*/
         [
            "nombre" => "Polvo Bronceador",
            "descripcion" => "De larga duración, resistente a la transferencia, un polvo bronceador que le regalará a tu piel un tono bronceado y un brillo instantáneo. Con una formula suave, fácil de difuminar, este producto te dará el bronceado de tus sueños.",
            "precio" => "1100",
            "foto" => "polvo bronceador.jpg",
            "categoria_id" => "1",
            'tipoproducto_id' => '9',
            "estado_id" => "3",
            'rating' => '5.0',
          ],
        [
            "nombre" => "Broncedor en Crema",
            "descripcion" => "Un bronceador en crema con tonalidad cálida que te dará una apariencia saludable y resaltará los contornos naturales de tu rostro. Con una formula hidratante, es cómodo de llevar a la vez de que tu piel lucirá bronceada.",
            "precio" => "1100",
            "foto" => "contorno en crema.jpg",
            "categoria_id" => "1",
            'tipoproducto_id' => '9',
            "estado_id" => "4",
            'rating' => '5.0',
          ],

            [
            "nombre" => "Iluminador Plateado",
            "descripcion" => "Un iluminador con un tono plateado único, con un subtono frio y de larga duración. Con una fórmula de crema a polvo y un terminado súper metálico para que le des protagonismo a todas las zonas altas de tu rostro como tus pómulos y el arco de las cejas.",
            "precio" => "1100",
            "foto" => "iluminador plateado.jpg",
            "categoria_id" => "1",
            'tipoproducto_id' => '8',
            "estado_id" => "5",
            'rating' => '3.0',
          ],


            [
            "nombre" => "Prebase Hidratante",
            "descripcion" => "Una prebase que será tu primer paso en tu rutina de maquillaje, ayuda a que la base dure mucho más tiempo a la vez que cierra poros e hidrata tu piel. La fórmula es libre de aceites, mejorando así la textura de tu piel.",
            "precio" => "1100",
            "foto" => "prebase hidratante.jpg",
            "categoria_id" => "1",
            'tipoproducto_id' => '4',
            "estado_id" => "3",
            'rating' => '5.0',
          ],

              [
            "nombre" => "Delineador Liquido Negro Matte",
            "descripcion" => "Un producto infaltable en cualquier colección de maquillaje. Un delineador negro para ojos, con una fórmula matte de larga duración, que no se mueve de su lugar hasta que vos decidas quitarlo!",
            "precio" => "1100",
            "foto" => "delineador liquido negro matte.jpg",
            "categoria_id" => "3",
            'tipoproducto_id' => '10',
            "estado_id" => "4",
            'rating' => '4.0',
          ],

                  [
            "nombre" => "Delineador Liquido Rosa",
            "descripcion" => "Un producto para ojos colorido, para darle un toque de color a tu maquillaje. Este delineador liquido en color rosa, con la misma fórmula matte y de larga duración llamará la atención de todos.",
            "precio" => "1100",
            "foto" => "delineador liquido rosa.jpg",
            "categoria_id" => "3",
            'tipoproducto_id' => '10',
            "estado_id" => "5",
            'rating' => '5.0',
          ],

             [
            "nombre" => "Dúo de Sombras",
            "descripcion" => "Un dúo de sombras de ojos metálicas, una violeta y otra rosa, para darle un cambio al maquillaje neutro de siempre.",
            "precio" => "1100",
            "foto" => "duo de sombras.png",
            "categoria_id" => "3",
            'tipoproducto_id' => '7',
            "estado_id" => "3",
            'rating' => '5.0',
          ],

             [
            "nombre" => "Esponja",
            "descripcion" => "La mejor herramienta para aplicar todo tipo de productos, tanto líquidos o en polvo, con un terminado sutil y natural. Nuestra esponja tiene el tamaño perfecto para tu rostro y para aplicar todos tus productos favoritos.",
            "precio" => "1100",
            "foto" => "esponja.jpg",
            "categoria_id" => "4",
            'tipoproducto_id' => '11',
            "estado_id" => "1",
            'rating' => '5.0',
          ],

             [
            "nombre" => "Espejo Pequeño",
            "descripcion" => "Un espejo de tamaño compacto que te acompañará a todos los lugares a donde vayas.",
            "precio" => "1100",
            "foto" => "espejo chico.jpg",
            "categoria_id" => "4",
            'tipoproducto_id' => '12',
            "estado_id" => "2 ",
            'rating' => '5.0',
          ],

             [
            "nombre" => "Brocha de Viaje",
            "descripcion" => "Una brocha compacta y pequeña para que la lleves a todos lados. Para aplicar productos en polvo y retocar tu maquillaje, será tu mejor acompañante vayas donde vayas.",
            "precio" => "1100",
            "foto" => "brocha de viaje.jpg",
            "categoria_id" => "4",
            'tipoproducto_id' => '1',
            "estado_id" => "3",
            'rating' => '5.0',
          ],


             [
            "nombre" => "Labial Matte Violeta",
            "descripcion" => "Una formula liviana en los labios, de larga duración y con un terminado matte, en una tonalidad que quedara perfecta en todos los tonos de piel. Un labial con un impactante color y completamente opaco desde la primera aplicación.",
            "precio" => "1100",
            "foto" => "labial matte violeta.jpg",
            "categoria_id" => "2",
            'tipoproducto_id' => '3',
            "estado_id" => "5",
            'rating' => '5.0',
          ],
          [
            "nombre" => "Labial Matte Salmón",
            "descripcion" => "Una formula liviana en los labios, de larga duración y con un terminado matte, en una tonalidad que quedara perfecta en todos los tonos de piel. Un labial con un impactante color y completamente opaco desde la primera aplicación.",
            "precio" => "1100",
            "foto" => "labial matte salmon.png",
            "categoria_id" => "2",
            'tipoproducto_id' => '3',
            "estado_id" => "5",
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
