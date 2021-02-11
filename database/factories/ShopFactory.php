<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shops\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'adresse' => $faker->address,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'descriptif' => $faker->text,
        'tel' => $faker->numerify('##########'),
        'prefixTel' => '+33',
        'email' => $faker->email,
        'siret' => $faker->numerify('##############'),
        'horaires' => '[lundi][mardi][mercredi][jeudi][vendredi][samedi][dimanche][ferié]',
        'etat' => $faker->state,
        'codeNote' => $faker->text,
        'city_id' => random_int(1,4),
        'subcategory_id' => random_int(1,6),
        'category_id' => random_int(1,7),

        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
