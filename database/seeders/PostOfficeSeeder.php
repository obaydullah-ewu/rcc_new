<?php

namespace Database\Seeders;

use App\Models\PostOffice;
use Illuminate\Database\Seeder;

class PostOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostOffice::insert([
            ['id' => 1, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 1, 'name' => 'নারায়ণগঞ্জ সদর'],

            ['id' => 2, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 2, 'name' => 'আমিনপুর'],
            ['id' => 3, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 2, 'name' => 'জামপুর'],
            ['id' => 4, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 2, 'name' => 'পিরিজপুর'],
            ['id' => 5, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 2, 'name' => 'বড়দি'],
            ['id' => 6, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 2, 'name' => 'মুগরা'],

            ['id' => 7, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 3, 'name' => 'বন্দর'],
            ['id' => 8, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 3, 'name' => 'বিআইডিএস'],
            ['id' => 9, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 3, 'name' => 'ডিসি মিলস'],
            ['id' => 10, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 3, 'name' => 'মদনগঞ্জ'],

            ['id' => 11, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 4, 'name' => 'আড়াইহাজার'],
            ['id' => 12, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 4, 'name' => 'গোপালদী'],

            ['id' => 13, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 5, 'name' => 'ভুলতা'],
            ['id' => 14, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 5, 'name' => 'কাঞ্চন'],
            ['id' => 15, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 5, 'name' => 'মুরাপাড়া'],
            ['id' => 16, 'division_id' => 1, 'district_id' => 1, 'upazila_id' => 5, 'name' => 'নাগরী'],
        ]);
    }
}
