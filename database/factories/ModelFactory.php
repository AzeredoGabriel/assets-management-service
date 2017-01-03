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

/**
 | --------------------------
 | Criando um objeto Person
 | --------------------------
 */

$factory->define(App\Models\Person::class, function (Faker\Generator $faker) {
	$faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    
    return [
        'name' => $faker->name,
        'cpf' => $faker->cpf(false),
    ];
});


/**
 | --------------------------
 | Criando um objeto User
 | --------------------------
 */

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $faker->addProvider(new Faker\Provider\Internet($faker));
    
    
    return [
        'email' => $faker->email,
        'login' => $faker->userName(false),
        'password' => $faker->password(false),
        'person_id' => array_rand(range(1, 10))
    ];
});

/**
 | --------------------------
 | Criando um objeto Company
 | --------------------------
 */

$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Company($faker));
    
    return [
        'name' => $faker->name,
        'cnpj' => $faker->cnpj(false),
    ];
});

/**
 | --------------------------
 | Criando um objeto Account
 | --------------------------
 */

$factory->define(App\Models\Account::class, function (Faker\Generator $faker) {
    return [
        'person_id' => array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9]),
        'company_id' => array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9]) 
    ];
});

/**
 | --------------------------
 | Criando um objeto Tag
 | --------------------------
 */
$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\Lorem($faker));
    return [
        'name' => $faker->word,
    ];
});


/**
 | --------------------------
 | Criando um objeto Customer
 | --------------------------
 */
$factory->define(App\Models\Customer::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\en_US\Company($faker));
    return [
        'name' => $faker->company,
        'account_id' => array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9])
    ];
});

/**
 | --------------------------
 | Criando um objeto Project
 | --------------------------
 */
$factory->define(App\Models\Project::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\Internet($faker));
    return [
        'name' => $faker->domainWord,
        'customer_id' => array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9]),
        'project_key' => md5($faker->domainWord)
    ];
});

/**
 | --------------------------
 | Criando um objeto Domain
 | --------------------------
 */
$factory->define(App\Models\Domain::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\Internet($faker));
    return [
        'domain' => $faker->domainName,
        'project_id' => array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9]),
    ];
});
