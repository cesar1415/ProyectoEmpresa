<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provider;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'ruc_number' => Str::random(10),
        'address' => $faker->address,
        'phone' => Str::random(10),
    ];
});
