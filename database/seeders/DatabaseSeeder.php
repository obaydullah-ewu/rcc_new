<?php

namespace Database\Seeders;

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
        $this->call(AdminSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(DivisionSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(UpazilaSeeder::class);
        $this->call(PostOfficeSeeder::class);
        $this->call(VillageSeeder::class);

        $this->call(MouzaSeeder::class);
        $this->call(LandKhotiyanSeeder::class);
    }
}
