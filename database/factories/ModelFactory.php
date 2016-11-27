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

$factory->define(App\Models\Person::class, function (Faker\Generator $faker) {
	$faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    
    return [
        'name' => $faker->name,
        'cpf' => $faker->cpf(false),
    ];
});

$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Company($faker));
    
    return [
        'name' => $faker->name,
        'cnpj' => $faker->cnpj(false),
    ];
});

$factory->define(App\Models\Account::class, function (Faker\Generator $faker) {
    return [
        'person_id' => array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9]),
        'company_id' => array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9]) 
    ];
});


$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\Lorem($faker));
    return [
        'name' => $faker->word,
    ];
});


$factory->define(App\Models\Customer::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\en_US\Company($faker));
    return [
        'name' => $faker->company,
        'account_id' => array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9])
    ];
});


$factory->define(App\Models\Project::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\Internet($faker));
    return [
        'name' => $faker->domainName,
        'customer_id' => array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9]),
        'project_key' => md5($faker->domainName)
    ];
});
