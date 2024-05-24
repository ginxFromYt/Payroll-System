<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks to truncate the table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('user__roles')->truncate();
        DB::table('users')->truncate();

        // Create base users for testing
        // $admin = User::create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        // $employee = User::create([
        //     'name' => 'Employee User',
        //     'email' => 'employee@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        $admin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('Admin****1234'),
        ]);

        $employee = User::create([
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'password' => Hash::make('Employee****1234'),
        ]);

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Retrieve roles from the database
        $adminRole = Role::where('name', 'admin')->first();
        $employeeRole = Role::where('name', 'employee')->first();

        // Assign roles to users
        $admin->roles()->attach($adminRole);
        $employee->roles()->attach($employeeRole);
    }
}
