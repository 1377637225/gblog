<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'tag' => $faker->word,
        'title' => $faker->sentence,
        'meta_description' => $faker->sentence
    ];
});
