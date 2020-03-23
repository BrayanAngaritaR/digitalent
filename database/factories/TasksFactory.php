<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
    	'idea_id' => rand(1, 2000),
		'step_id' => rand(1, 3),
    ];
});
