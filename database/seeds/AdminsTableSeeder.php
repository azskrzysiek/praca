<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_admin = Role::where('name', 'Admin')->first();

        $admin = new User();
        $admin->name = 'Krzysztof Nowicki';
        $admin->email = 'kris@gmail.com';
        $admin->username = 'azskrzysiek';
        $admin->password = bcrypt('123');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
