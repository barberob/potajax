<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Moderator;
use Faker\Generator as Faker;

$factory->define(Moderator::class, function (Faker $faker) {
    return [
        'nomMod' => $faker->name,
        'prenomMod' => $faker->lastName,
        'mailMod' => $faker->unique()->safeEmail,
        'mdpMod' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'etatMod' => 1,
    ];
});
