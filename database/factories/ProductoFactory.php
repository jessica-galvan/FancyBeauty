<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Producto;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Producto::class, function (Faker $faker) {
    $dir = storage_path('app/public/productos');
    $categorias = App\Categoria::all()->random()->id;
    $tipoProductos = App\TipoProducto::all()->random()->id;
    $estados = App\Estado::all()->random()->id;
    return [
        'nombre' => $faker->word(3),
        'descripcion' => $faker->text,
        'precio' => $faker->numberBetween(800, 5000),
        'foto' => $faker->image($dir, 200, 200, 'fashion', false),
        'rating' => $faker->randomFloat(1, 1, 5),
        'categoria_id' => $categorias,
        'estado_id' => $estados,
        'tipoproducto_id'=> $tipoProductos,
    ];
});
