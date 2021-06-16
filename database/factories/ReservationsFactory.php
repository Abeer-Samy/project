<?php

// @var \Illuminate\Database\Eloquent\Factory $factory
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Reservations;
use Faker\Generator as Faker;

$factory->define(Reservations::class, function (Faker $faker) {
    return [
        'name' =>$this->faker->sentence,
        'email' => $this->faker->email,
        'numOfPerson' => random_int(20,200),
        'phoneNumber'=> $this->faker->randomNumber(9),
        'tableRes' => random_int(20,100000),
        'menu_id' => \App\Menu::all()->random()
    ];
});
