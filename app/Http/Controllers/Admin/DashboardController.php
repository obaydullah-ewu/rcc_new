<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['pageTitle'] = 'Home';
        $data['subNavDashboardActiveCLass'] = 'active';
        $data['total_admin'] = Admin::count();
        return view('admin.dashboard')->with($data);
    }
}
