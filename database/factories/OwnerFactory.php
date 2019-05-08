<?php

use Faker\Generator as Faker;

$factory->define(App\Owner::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'vehicle_no' =>  '12312',
    ];
});
