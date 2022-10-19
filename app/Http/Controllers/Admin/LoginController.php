<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email_or_mobile_number' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email_or_mobile_number)->orWhere('mobile_number', $request->email_or_mobile_number)->first();

        if ($admin) {
            if ($admin->email) {
                $user = [
                    'email' => $admin->email,
                    'password' => $request->password
                ];
            } elseif($admin->mobile_number) {
                $user = [
                    'mobile_number' => $admin->mobile_number,
                    'password' => $request->password
                ];
            }

            if(auth()->guard('admin')->attempt($user)){
                return redirect()->route('admin.dashboard')->with('success','Login Successful');
            }
        }

        return redirect()->route('admin.login')->with('error','Invalid Credentials');
    }

    public function logout(Request $request)
    {
        Auth()->guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Logout Successful');
    }
}
