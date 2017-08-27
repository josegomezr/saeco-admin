<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\ApiToken::class, function (Faker\Generator $faker) {
    return [
        'token' => sha1(microtime()),
        'activo' => true,
    ];
});
$factory->define(App\Models\OrigenPermitido::class, function (Faker\Generator $faker) {
    return [
        'red' => $faker->ipv4,
        'permitir' => true,
    ];
});
