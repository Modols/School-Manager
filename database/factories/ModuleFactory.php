<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Module;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['SQL' ,'Securite', 'UML', 'Reseaux', 'PHP', 'Linux', 'IoT']),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});

// $table->string('name');
// $table->string('description');