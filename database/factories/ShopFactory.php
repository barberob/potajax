<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shops\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'adress' => $faker->adress,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'description' => $faker->description,
        'phone' => $faker->phone,
        'phonePrefix' => $faker->phonePrefix,
        'email' => $faker->email,
        'siret' => $faker->siret,
        'hours' => $faker->hours,
        'state' => $faker->state,
        'codeReview' => $faker->codeReview,
        'city_id' => factory(App\City::class),
        'subcategory_id' => factory(App\Subcategory::class),
        'category_id' => factory(App\Category::class),

        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
