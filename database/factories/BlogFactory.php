<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
      'title' => $faker->unique()->catchPhrase(),
      'user_id' => $faker->numberBetween(1,3),
      'category_id' => $faker->numberBetween(1,2),
      'image' => $faker->randomElement(
        ['/assets/images/dummy/player1.jpg', 
         '/assets/images/dummy/player2.jpg',
         '/assets/images/dummy/player3.jpg',
         '/assets/images/dummy/player4.jpg']),
      'content' => $faker->realText(200)
    ];
});
