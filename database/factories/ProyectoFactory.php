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

$factory->define(App\Proyecto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->jobTitle,
        'descripcion' => $faker->catchPhrase,
        'fecha_estimada' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years'),
        'lider_id' => function () {
            return App\Desarrollador::all()->random()->id;
        }
    ];
});
