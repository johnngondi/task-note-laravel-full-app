<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TasksList;
use Faker\Generator as Faker;

$factory->define(TasksList::class, function (Faker $faker) {
    return [
        'title' => $faker->words(2,true),
        'user_id' => factory(\App\User::class),
        'color' => $faker->colorName
    ];
});
