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
     
	    factory(App\Models\Person::class    , 10)->create(); 
        echo "people criadas com sucesso! \n";

        //------------------------------------------------
	    factory(App\Models\User::class   , 10)->create(); 
        
        DB::table('users')->insert([
            'email' => 'g.almeida.azeredo@gmail.com',
            'login' => "azeredogab",
            'password' => bcrypt("teste123"),
            'person_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        echo "users criadas com sucesso! \n";

        //------------------------------------------------

        factory(App\Models\Company::class   , 10)->create(); 
        echo "companies criadas com sucesso! \n";

	    factory(App\Models\Account::class   , 10)->create(); 
        echo "accounts criadas com sucesso! \n";

        factory(App\Models\Tag::class       , 10)->create();
        echo "tags criadas com sucesso! \n";

        factory(App\Models\Customer::class  , 10)->create();
        echo "customers criados com sucesso! \n";

        factory(App\Models\Project::class   , 10)->create();
        echo "projects criados com sucesso! \n";

        factory(App\Models\Domain::class    , 3)->create();
        echo "domains criados com sucesso! \n";
    }
}
