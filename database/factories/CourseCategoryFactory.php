<?php

use App\Models\CourseCategory;
use Faker\Generator as Faker;

$factory->define(CourseCategory::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text
    ];
});
