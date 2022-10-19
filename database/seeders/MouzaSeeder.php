<?php

namespace Database\Seeders;

use App\Models\Mouza;
use Illuminate\Database\Seeder;

class MouzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mouza::insert([
            ['id'=>1, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'পাগলা', 'land_nature_filled_present_rate' => 30.30, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>2, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'চাষড়া', 'land_nature_filled_present_rate' => 20.00, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>3, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'ইসদাইর', 'land_nature_filled_present_rate' => 20.00, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>4, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'হরিহরপাড়া', 'land_nature_filled_present_rate' => 20.00, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>5, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'মাসদাইর', 'land_nature_filled_present_rate' => 20.00, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>6, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'ফতুল্লা', 'land_nature_filled_present_rate' => 20.00, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>7, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'লালপুর', 'land_nature_filled_present_rate' => 20.00, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>8, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'দাপা-ইদ্রাকপুর', 'land_nature_filled_present_rate' => 20.00, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>9, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'খিজিরপুর', 'land_nature_filled_present_rate' => 20.00, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>10, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'আলীগঞ্জ', 'land_nature_filled_present_rate' => 20.00, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>11, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>1, 'name' => 'ধোপাতিতা', 'land_nature_filled_present_rate' => 20.00, 'land_nature_pond_present_rate' => 1210 ],
            ['id'=>12, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>3, 'name' => 'শ্রীরামপুর', 'land_nature_filled_present_rate' => 5.00, 'land_nature_pond_present_rate' => 0 ],
            ['id'=>13, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>3, 'name' => 'দক্ষিণ কুল চরিত্র', 'land_nature_filled_present_rate' => 6.70, 'land_nature_pond_present_rate' => 0 ],
            ['id'=>14, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>3, 'name' => 'কুশিয়ারা', 'land_nature_filled_present_rate' => 5.00, 'land_nature_pond_present_rate' => 0 ],
            ['id'=>15, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>3, 'name' => 'লক্ষাদরদী', 'land_nature_filled_present_rate' => 5.00, 'land_nature_pond_present_rate' => 0 ],
            ['id'=>16, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>2, 'name' => 'পূর্ব গোপালদী', 'land_nature_filled_present_rate' => 0.00, 'land_nature_pond_present_rate' => 80 ],
            ['id'=>17, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>2, 'name' => 'জয়রামপুর', 'land_nature_filled_present_rate' => 0.00, 'land_nature_pond_present_rate' => 150 ],
            ['id'=>18, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>5, 'name' => 'টাওরা', 'land_nature_filled_present_rate' => 0.00, 'land_nature_pond_present_rate' => 100 ],
            ['id'=>19, 'division_id'=>1, 'district_id'=>1,'upazila_id'=>4, 'name' => 'দাইরাদীরচর', 'land_nature_filled_present_rate' => 2.00, 'land_nature_pond_present_rate' => 200 ],
        ]);
    }
}
