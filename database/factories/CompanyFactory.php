<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Company::class, function (Faker $faker) {
    return [
        'company_name' => $faker->company,
        'designation' => $faker->domainWord,
        'from_month' => $faker->monthName($max = 'now'),
        'from_year' => $faker->randomElement(['2015','2016','2017','2018']), 
        'to_month' => $faker->monthName($max = 'now'),
        'to_year' => $faker->randomElement(['2019','2020']), 
        'job_type' => $faker->randomElement(['Full Time','Part Time','Consultant']),
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
