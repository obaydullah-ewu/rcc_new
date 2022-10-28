<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\WardSignature;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;

class SettingController extends Controller
{
    public function generalSetting()
    {
        $data['pageTitle'] = 'সাধারণ সেটিং';
        $data['navSettingActiveClass'] = 'hover show';
        $data['subNavGeneralSettingActiveCLass'] = 'active';
        return view('admin.setting.general-setting')->with($data);
    }

    public function citizenshipSetting()
    {
        $data['pageTitle'] = 'নাগরিকত্ব সেটিং';
        $data['navSettingActiveClass'] = 'hover show';
        $data['subNavCitizenshipSettingActiveCLass'] = 'active';
        return view('admin.setting.citizenship-setting')->with($data);
    }

    public function generalSettingUpdate(Request $request)
    {
        $inputs = Arr::except($request->all(), ['_token']);
        $keys = [];

        foreach ($inputs as $k => $v) {
            $keys[$k] = $k;
        }

        foreach ($inputs as $key => $value) {
            $option = Setting::firstOrCreate(['option_key' => $key]);

            if ($request->hasFile('app_logo') && $key == 'app_logo') {
                $request->validate([
                    'app_logo' => 'mimes:jpg,png,jpeg|file'
                ]);
                deleteFile(getFile(getOption('app_logo')));
                $option->option_value = saveImage('Setting', $request->app_logo);;
                $option->save();
            } elseif ($request->hasFile('app_fav_icon') && $key == 'app_fav_icon') {
                $request->validate([
                    'app_fav_icon' => 'mimes:jpg,png,jpeg|file'
                ]);
                deleteFile(getFile(getOption('app_fav_icon')));
                $option->option_value = saveImage('Setting', $request->app_fav_icon);;
                $option->save();
            } else {
                $option->option_value = $value;
                $option->save();
            }
        }

        return redirect()->back()->with('success', 'Updated Successfully');
    }
}
