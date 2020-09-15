<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'user_id' => factory(\App\User::class),
        'tasks_list_id' => factory(\App\TasksList::class)
    ];
});
