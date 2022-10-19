<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            ["id"=>"1","name"=>"dashboard","display_name"=>"ড্যাশবোর্ড","submodule_id"=>"0","guard_name"=>"web"],
            ["id"=>"2","name"=>"admin","display_name"=>"অ্যাডমিন","submodule_id"=>"0","guard_name"=>"web"],
            ["id"=>"3","name"=>"admin_list","display_name"=>"Admin List","submodule_id"=>"2","guard_name"=>"web"],
            ["id"=>"4","name"=>"add_admin","display_name"=>"Add Admin","submodule_id"=>"2","guard_name"=>"web"],
            ["id"=>"5","name"=>"edit_admin","display_name"=>"Edit Admin","submodule_id"=>"2","guard_name"=>"web"],
            ["id"=>"6","name"=>"view_admin","display_name"=>"View Admin","submodule_id"=>"2","guard_name"=>"web"],

            ["id"=>"7","name"=>"user","display_name"=>"ব্যবহারকারী","submodule_id"=>"0","guard_name"=>"web"],
            ["id"=>"8","name"=>"user_list","display_name"=>"User List","submodule_id"=>"7","guard_name"=>"web"],
            ["id"=>"9","name"=>"add_user","display_name"=>"Add User","submodule_id"=>"7","guard_name"=>"web"],
            ["id"=>"10","name"=>"edit_user","display_name"=>"Edit User","submodule_id"=>"7","guard_name"=>"web"],
            ["id"=>"11","name"=>"view_user","display_name"=>"View User","submodule_id"=>"7","guard_name"=>"web"],

            ["id"=>"12","name"=>"role","display_name"=>"পদবি","submodule_id"=>"0","guard_name"=>"web"],
            ["id"=>"13","name"=>"role_list","display_name"=>"Role List","submodule_id"=>"12","guard_name"=>"web"],
            ["id"=>"14","name"=>"edit_role","display_name"=>"Edit Role","submodule_id"=>"12","guard_name"=>"web"],
            ["id"=>"15","name"=>"view_role","display_name"=>"View Role","submodule_id"=>"12","guard_name"=>"web"],

            ["id"=>"16","name"=>"address","display_name"=>"ঠিকানা","submodule_id"=>"0","guard_name"=>"web"],
            ["id"=>"17","name"=>"division","display_name"=>"Division","submodule_id"=>"16","guard_name"=>"web"],
            ["id"=>"18","name"=>"district","display_name"=>"District","submodule_id"=>"16","guard_name"=>"web"],
            ["id"=>"19","name"=>"upazila","display_name"=>"Upazila","submodule_id"=>"16","guard_name"=>"web"],
            ["id"=>"20","name"=>"post_office","display_name"=>"Post Office","submodule_id"=>"16","guard_name"=>"web"],
            ["id"=>"21","name"=>"village","display_name"=>"Village","submodule_id"=>"16","guard_name"=>"web"],

            ["id"=>"23","name"=>"land_information","display_name"=>"জমির তথ্য","submodule_id"=>"22","guard_name"=>"web"],
            ["id"=>"24","name"=>"mouza","display_name"=>"Mouza","submodule_id"=>"22","guard_name"=>"web"],
            ["id"=>"25","name"=>"khotiyan","display_name"=>"Khotiyan","submodule_id"=>"22","guard_name"=>"web"],
            ["id"=>"26","name"=>"dag_no","display_name"=>"Dag No","submodule_id"=>"22","guard_name"=>"web"],
            ["id"=>"27","name"=>"land_amount","display_name"=>"Land Amount","submodule_id"=>"22","guard_name"=>"web"],

            ["id"=>"28","name"=>"land_allotment","display_name"=>"বরাদ্দপ্রাপ্ত জমি","submodule_id"=>"0","guard_name"=>"web"],
            ["id"=>"29","name"=>"land_allotment_data_entry","display_name"=>"বরাদ্ধপ্রাপ্তদের ডাটা এন্ট্রি ফর্ম","submodule_id"=>"28","guard_name"=>"web"],
            ["id"=>"30","name"=>"land_allotment_list","display_name"=>"বরাদ্ধপ্রাপ্তদের তালিকা","submodule_id"=>"28","guard_name"=>"web"],
            ["id"=>"31","name"=>"cancelled_land_allotment_list","display_name"=>"বাতিল বরাদ্ধপ্রাপ্তদের তালিকা","submodule_id"=>"28","guard_name"=>"web"],

            ["id"=>"32","name"=>"renew_land_allotment_application","display_name"=>"লিজ নবায়ন জমি","submodule_id"=>"0","guard_name"=>"web"],
            ["id"=>"33","name"=>"renew_land_allotment_application_list","display_name"=>"জমি ইজারা নবায়ন আবেদনের তালিকা","submodule_id"=>"32","guard_name"=>"web"],
            ["id"=>"34","name"=>"cancelled_renew_land_allotment_application_list","display_name"=>"বাতিল নবায়নের বরাদ্ধপ্রাপ্তদের তালিকা","submodule_id"=>"32","guard_name"=>"web"],
        ]);
    }
}
