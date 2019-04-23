<?php

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

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'nombre' => $faker->jobTitle,
        'descripcion' => $faker->optional()->paragraph($nbSentences = 3, $variableNbSentences = true),
        'fecha_estimada' => $faker->optional()->dateTimeBetween($startDate = 'now', $endDate = '+2 years'),
        'prioridad' => ['urgente', 'alta', 'media','baja'][rand(0,3)],
        'proyecto_id' => function () {
            return App\Proyecto::all()->random()->id;
        },
        'tipo_item_id' => function () {
            return App\TipoItem::all()->random()->id;
        },
    ];
});

$factory->afterCreating(App\Item::class, function ($item, $faker) {
    $estadoInicial = App\Estado::where('nombre', 'Creado')->first();
    $responsable = App\Desarrollador::all()->random();
    $item->setEstadoActual($responsable, $estadoInicial);
});
