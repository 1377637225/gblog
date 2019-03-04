<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $user_id = \App\User::pluck('id')->random();
    $category_id = \App\Category::pluck('id')->random();
    $title = $faker->sentence(mt_rand(3, 10));

    return [
        'user_id' => $user_id,
        'category_id' => $category_id,
        'last_user_id' => $user_id,
        'slug' => str_slug($title),
        'title' => $title,
        'subtitle' => strtolower($title),
        'content' => $faker->paragraph,
        'page_image' => $faker->imageUrl(),
        'meta_description' => $faker->sentence,
        'is_draft' => false,
        'published_at' => $faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now')
    ];
});
