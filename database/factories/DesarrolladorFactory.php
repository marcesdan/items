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

$factory->define(App\Desarrollador::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'username' => $faker->unique()->userName,
        'email' => $faker->safeEmail,
        'telefono' => '2901-15606162',
        'password' => bcrypt('secret'),
    ];
});

$factory->afterCreating(App\Desarrollador::class, function ($desarrollador, $faker) {
    $desarrollador->assignRole('user');
});
