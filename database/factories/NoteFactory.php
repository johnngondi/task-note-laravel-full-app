<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3,true),
        'body' => $faker->paragraph,
        'user_id' => factory(\App\User::class),
        'category' => $faker->word
    ];
});
