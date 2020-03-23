<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserTask;
use Faker\Generator as Faker;

$factory->define(UserTask::class, function (Faker $faker) {
    return [
        'task_id'	=> rand(1, 500),
		'idea_id'	=> rand(1, 2000),
		'step_id'	=> rand(1, 3),
		'user_id'	=> rand(1, 200),
    ];
});


