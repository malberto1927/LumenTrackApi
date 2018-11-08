<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Track::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'duration' => $faker->numberBetween(2,7),
        'author_id' => $faker->numberBetween(1,50),
    ];
});
