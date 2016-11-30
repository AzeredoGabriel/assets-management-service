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
	    factory(App\Models\Company::class   , 10)->create(); 
	    factory(App\Models\Account::class   , 10)->create(); 
        factory(App\Models\Tag::class       , 10)->create();
        factory(App\Models\Customer::class  , 10)->create();
        factory(App\Models\Project::class   , 10)->create();
        factory(App\Models\Domain::class    , 3)->create();

        foreach (['Watermark', 'Filter', 'Optimize'] as $index) {
            DB::table('processes')->insert([
                'name' => $index, 
                'class' => $index,
            ]);
        }

        DB::table('process_tag')->insert([
            'process_id' => 1, 
            'tag_id' => 1,
        ]);
        
        DB::table('process_tag')->insert([
            'process_id' => 1, 
            'tag_id' => 2,
        ]);

        DB::table('process_tag')->insert([
            'process_id' => 2, 
            'tag_id' => 3,
        ]);

    }
}
