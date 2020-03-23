<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Idea;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Idea::class, function (Faker $faker) {
	$title = $faker->sentence($nbWords = 6, $variableNbWords = true);
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'extract' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'url' => $faker->url,
        'category_id' => rand(1, 5),
    ];
});
