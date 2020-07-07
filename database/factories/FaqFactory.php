<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faq;
use Faker\Generator as Faker;

$factory->define(Faq::class, function (Faker $faker) {
    return [
      'question' => $faker->unique()->sentence(8),
      'answer' => $faker->unique()->realText(100)
    ];
});
