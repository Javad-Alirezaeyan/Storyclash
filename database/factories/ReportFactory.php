<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        "name" => $faker->text( 20),
        "collection" => function(){
            return \App\Collection::all()->random()->id;
        }
    ];
});
