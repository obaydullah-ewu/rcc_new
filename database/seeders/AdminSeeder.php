<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
           ['id' => 1,'name'=>'Administration','email'=>'admin@admin.com', 'mobile_number'=>'01921195942','password'=>Hash::make(123456)]
        ]);
    }
}
