<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\FactoryDevice::class, function (Faker $faker) {
    return [
        'Name' => $faker->word,
        'Year' => $faker->year($max = 'now'),
        'Type' => $faker->word
    ];
});
