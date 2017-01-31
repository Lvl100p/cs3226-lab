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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Student::class, function(Faker\Generator $faker){
    $mc = $faker->randomDigit;
    $tc = $faker->randomDigit;
    $spe = $mc + $tc;
    $hw = $faker->randomDigit;
    $bs  = $faker->randomDigit;
    $ks = $faker->randomDigit;
    $ac  = $faker->randomDigit;
    $dil  = $hw + $bs + $ks + $ac;

    $sum = $spe + $dil;
    return [
        'rank' => $faker->randomDigit,
        'name' => $faker->name,
        'flag' => $faker->countryCode,
        'mc' => $mc,
        'tc' => $tc,
        'spe'  => $spe,
        'hw' => $hw,
        'bs'  => $bs,
        'ks' => $ks,
        'ac'  => $ac,
        'dil'  => $dil,
        'sum' => $sum
    ];
});
