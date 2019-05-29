<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'club_id_home' => rand(1,12),
        'club_id_away' => rand(1,12),
        'scoreFull' => rand(15,40).':'.rand(15,40),
        'scoreHalf' => rand(5,14).':'.rand(5,14),
        'description' => $faker->sentence,
    ];
});
