<?php

use Faker\Generator as Faker;

$factory->define(App\Cronos::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'deadline_start' => $faker->dateTime,
        'deadline_end' => $faker->dateTime,
        'progress' => 57.3
    ];
});
