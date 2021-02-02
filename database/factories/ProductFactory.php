<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->description,
        'reference' => $faker->reference,
        'price' => $faker->price,
        'shops_id' => factory(App\Shop::class),
        'unit_id' => factory(App\Unit::class),
    ];
});
