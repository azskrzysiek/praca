<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
            'position' => rand(0,10),
            'club_id' => rand(1,12),
    ];
});
