<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $this->call(ClubsTableSeeder::class);
        
            factory(App\User::class, 12*16)
           ->create()
           ->each(function ($user) {
                $user->posts()->saveMany(factory(App\Post::class,3)->make());
            });

    }
}
