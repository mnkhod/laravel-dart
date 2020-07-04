<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
      'name' => $faker->unique()->name,
      'description' => $faker->unique()->text(200),
      'bar_code' => $faker->numberBetween(1000000000000,9000000000000),
      'product_code' => $faker->numberBetween(1000,9999),
      'images' => json_encode($faker->randomElements(
        ['/assets/images/dummy/player1.jpg', 
         '/assets/images/dummy/player2.jpg',
         '/assets/images/dummy/player3.jpg',
         '/assets/images/dummy/player4.jpg'],3
      )),
      'featured' => $faker->numberBetween(1,0),
      'rating' => $faker->numberBetween(1,5),
      'top_category_id' => $faker->numberBetween(1,9),
      'sub_category_id' => $faker->numberBetween(1,9),
    ];
});
