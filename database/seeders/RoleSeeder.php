<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{

    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create role names
        Role::create(['name' => 'admin']); 
        Role::create(['name' => 'employee']);
    }
}
