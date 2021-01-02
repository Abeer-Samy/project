<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Menu::class, function (Faker $faker) {
    return [
        'nameOfMeal'=>$this->faker->word(),
        'price'=>$this->faker->randomNumber(2),
        'ingredients' =>$this->faker->sentence(),
        'description' =>$this->faker->sentence(),

    ];
});
