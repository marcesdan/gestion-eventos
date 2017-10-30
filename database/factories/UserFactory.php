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

$factory->define(App\Evento::class, function (Faker $faker) {

    return [
        'nombre' => $faker->catchPhrase,
        'descripcion' => $faker->paragraph,
        'fecha' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get())
    ];
});

$factory->define(App\Asistente::class, function (Faker $faker) {

    return [
        'nombre' => $faker->firstname,
        'apellido' => $faker->lastName,
        'documento' => $faker->numberBetween(1000000, 99999999),
        'email' => $faker->email,
    ];
});
