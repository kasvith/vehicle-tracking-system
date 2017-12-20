<?php

use Faker\Generator as Faker;

$factory->define(App\Owner::class, function (Faker $faker) {
    return [
	    'first_name' => $faker->firstName,
	    'last_name' => $faker->lastName,
		'date_of_birth' => $faker->date('Y-m-d'),
		'nic' => $faker->isbn10,
		'gender'  => $faker->randomElement(['male', 'female']),
		'title' => $faker->randomElement(['mr', 'mrs', 'miss', 'rev']),
		'address' => $faker->address,
		'district' => $faker->streetSuffix,
		'province' => $faker->streetName,
    ];
});
