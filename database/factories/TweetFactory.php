<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Tweet;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        'body' => $faker->name,
    ];
});
