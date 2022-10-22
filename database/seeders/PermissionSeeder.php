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
        ]);
    }
}
