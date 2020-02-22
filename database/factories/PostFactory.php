<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,10),
        'title' => $faker->title,
        'sub_title' => $faker->firstName,
        'description' => $faker->domainName,
    ];
});
