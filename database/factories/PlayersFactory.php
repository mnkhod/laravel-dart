<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Players::class, function (Faker $faker) {
    return [
      'name' => $faker->unique()->name,
      'description' => $faker->unique()->text(200),
      'image' => $faker->randomElement(
        ['/assets/images/dummy/player1.jpg', 
         '/assets/images/dummy/player2.jpg',
         '/assets/images/dummy/player3.jpg',
         '/assets/images/dummy/player4.jpg']),
      'nickname' => $faker->unique()->streetName(),
      'dart_style' => $faker->randomElement(
        ['Specialist', 
         'Parallel',
         'Scallop']),
      'throwing_style' => $faker->randomElement(
        ['Right Handed', 
         'Left Handed']),
      'best_match' => $faker->randomElement(
        ['2012 vs Wes Newton (11-5)', 
         'Last 32 2011',
         '2009 vs Martin Adams (6-7)',
         '2010 vs Mervyn King (13-11)']),
      'rank_title' => $faker->randomElement(
        ['European Championship 2012', 
         'Last 32 - World Championship 2011',
         'Runner-up - World Masters 2009',
         'Winner - Players Championship Finals 2010']),
    ];
});
