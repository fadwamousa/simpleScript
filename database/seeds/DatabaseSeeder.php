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

        factory(App\Contact::class,30)->create();

    }
}
