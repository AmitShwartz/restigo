<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Diversity;
use Faker\Generator as Faker;

$factory->define(Diversity::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'enable'=> $faker->enable
    ];
});
