<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['pageTitle'] = 'Home';
        $data['subNavDashboardActiveCLass'] = 'active';
        $data['total_admin'] = Admin::count();
        $data['total_member'] = User::count();
        $data['total_designation'] = Role::count();
        return view('admin.dashboard')->with($data);
    }
}
