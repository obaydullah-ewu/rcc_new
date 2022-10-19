<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profileOverview()
    {
        $data['pageTitle'] = "Profile";
        $data['profileOverviewNavActive'] = "active";
        $data['user'] = Admin::find(Auth::guard('admin')->user()->id);

        return view('admin.account.profile-overview')->with($data);
    }

    public function profileSettings()
    {
        $data['pageTitle'] = "Profile Settings";
        $data['profileSettingsNavActive'] = "active";
        $data['user'] = Admin::find(Auth::guard('admin')->user()->id);

        return view('admin.account.profile-settings')->with($data);
    }
}
