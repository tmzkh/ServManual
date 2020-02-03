<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\MaintenanceTask::class, function (Faker $faker) {
    return [
        'Description' => $faker->text($maxNbChars = 200) ,
        'Criticality' => $faker->numberBetween($min = 0, $max = 2)
    ];
});
