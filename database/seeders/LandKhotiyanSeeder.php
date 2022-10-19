<?php

namespace Database\Seeders;

use App\Models\LandKhotiyan;
use Illuminate\Database\Seeder;

class LandKhotiyanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LandKhotiyan::insert([
            ['name' => 'CS'],
            ['name' => 'RS'],
            ['name' => 'SA'],
            ['name' => 'BS'],
        ]);
    }
}
