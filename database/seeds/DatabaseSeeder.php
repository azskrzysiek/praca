<?php

use App\Role;
use App\User;
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
        $this->call(RoleTableSeeder::class);
        
        factory(App\User::class, 12*16)
        ->create()
        ->each(function ($user) {
            $user->posts()->saveMany(factory(App\Post::class,3)->make());
        });
        
        $roles = App\Role::where('id', 1)->orWhere('id',2)->get();
        
        // Populate the pivot table
        App\User::all()->each(function ($user) use ($roles) { 
            $user->roles()->attach(
                $roles->random(rand(1, 2))->pluck('id')->toArray()
            ); 
        });
        
        $this->call(AdminsTableSeeder::class);
    }
}
