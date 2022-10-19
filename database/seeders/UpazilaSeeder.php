<?php

namespace Database\Seeders;

use App\Models\Upazila;
use Illuminate\Database\Seeder;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Upazila::insert([
            ["id"=>1, "division_id" => 1, "district_id" => 1 ,"name"=>"নারায়ণগঞ্জ সদর"],
            ["id"=>2, "division_id" => 1, "district_id" => 1 ,"name"=>"সোনারগাঁ"],
            ["id"=>3, "division_id" => 1, "district_id" => 1 ,"name"=>"বন্দর"],
            ["id"=>4, "division_id" => 1, "district_id" => 1 ,"name"=>"আড়াইহাজার"],
            ["id"=>5, "division_id" => 1, "district_id" => 1 ,"name"=>"রূপগঞ্জ"],
        ]);
    }
}
