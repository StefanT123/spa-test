<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {

	$user = User::inRandomOrder()->first();

    return [
        'user_id' 	=> $user->id,
        'body' 		=> $faker->sentence
    ];
});
