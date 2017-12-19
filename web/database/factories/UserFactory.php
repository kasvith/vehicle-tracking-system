<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
	    'created_at' => $faker->dateTime(),
	    'updated_at' => $faker->dateTime(),
	    'type' => $faker->randomElement(['admin', 'officer']),
	    'gender' => $faker->randomElement(['male', 'female']),
	    'nic' => $faker->unique()->isbn13,
	    'image' => '_admin/img/avatar.png',
	    'address' => $faker->address,
	    'last_login' => $faker->dateTime(),
	    'last_login_ip' => $faker->ipv4,
    ];
});
