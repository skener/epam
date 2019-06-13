<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'poster' => $faker->url(),
        'name'   => $faker->sentence(5),
        'author' => $faker->name,
        'price'  => $faker->randomFloat,
        'date'   => $faker->date(),
    ];
});
