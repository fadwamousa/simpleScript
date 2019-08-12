<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,30)->create();
        factory(App\Company::class,50)->create();
        factory(App\Job::class,50)->create();

        $categories = [

            'Art',
            'Community',
            'Design',
            'Web',
            'Back End ',
            'IOS Development'
        ];

        foreach ($categories as $category){

            \App\Category::create(['name' => $category]);
        }
    }
}
