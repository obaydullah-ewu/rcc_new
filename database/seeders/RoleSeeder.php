<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['id' => 1, 'name' => 'প্রধান নির্বাহী কর্মকর্তা', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'সার্ভেয়ার', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'প্রশাসনিক কর্মকর্তা', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'উচ্চমান/নিন্মমান সহকারী কাম কম্পিউটার', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
