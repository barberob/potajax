<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Users\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'nom' => $faker->firstName,
        'prenom' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'mdp' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'adresse' => 'Jean Eude',
        'prefixtel' => '+33',
        'tel' => $faker->numerify('##########'),
        'role' => random_int(1,3),

        'city_id' => random_int(1,4),

        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => '',
    ];
});

