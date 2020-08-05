<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $superadminRole = Role::where('name','Super Admin')->first();
        $adminRole = Role::where('name','Admin')->first();

        $superadmin = User::create([
            'firstname' => 'Super Admin',
        	'lastname' => 'admin',
        	'email' => 'superadmin@admin.com',
        	'password' => bcrypt('superadmin1234'),
            'role' => 'Super Admin'
        ]);

        $admin = User::create([
        	'firstname' => 'Admin',
            'lastname' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin1234'),
            'role' => 'Admin'
        ]);

        $superadmin->roles()->attach($superadminRole);
        $admin->roles()->attach($adminRole);
    }
}
