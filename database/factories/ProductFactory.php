<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'libelle' => $faker->text,
        'description' => $faker->text,
        'reference' => $faker->text,
        'prix' => $faker->random_int(1, 50),
        'shops_id' => $faker->random_int(1, 20),
        'unit_id' => $faker->random_int(1, 5),

        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
