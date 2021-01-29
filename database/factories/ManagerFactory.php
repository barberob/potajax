<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Manager;
use Faker\Generator as Faker;

$factory->define(Manager::class, function (Faker $faker) {

    return [
        'nomMan' => $faker->name,
        'prenomMan' => $faker->lastName,
        'mailMan' => $faker->unique()->safeEmail,
        'mdpMan' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'telMan' => $faker->phoneNumber,
        'prefixeTelMan' => '+33',
    ];
});
