<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['pageTitle'] = 'Home';
        $data['subNavDashboardActiveCLass'] = 'active';
        return view('user.dashboard')->with($data);
    }
}
