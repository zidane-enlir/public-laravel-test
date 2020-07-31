<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Models\UserProfile;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'introduction' => '初めまして。',
        'birthday' => '2001-05-05',
    ];
});