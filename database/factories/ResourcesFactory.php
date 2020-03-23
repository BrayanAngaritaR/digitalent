<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resource;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $faker) {
    return [
		'title'				=> $faker->sentence,
    	'url'				=> $faker->url,
    	'english_resource' 	=> $faker->boolean,
    	'idea_id'			=> rand(1, 2000),
		'step_id'			=> rand(1, 3)
    ];
});
