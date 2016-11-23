<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
     
	    factory(App\Person::class, 10)->create(); 
	    factory(App\Company::class, 10)->create(); 
	    factory(App\Account::class, 10)->create(); 
    }
}
