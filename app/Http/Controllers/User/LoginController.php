<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showRegistrationForm()
    {
        return view('user.auth.registration');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->name_en = $request->name_en;
        $user->name_bn = $request->name_bn;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if(auth()->attempt($request->only('email', 'password'))){
            return redirect()->route('user.dashboard')->with('success','Login Successful');
        }

        return redirect()->route('user.login')->with('error','Invalid Credentials');
    }

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email_or_mobile_number' => 'required',
            'password' => 'required'
        ]);

        $admin = User::where('email', $request->email_or_mobile_number)->orWhere('mobile_number', $request->email_or_mobile_number)->first();

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

            if(auth()->attempt($user)){
                return redirect()->route('user.dashboard')->with('success','Login Successful');
            }
        }
        return redirect()->route('user.login')->with('error','Invalid Credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('user.login')->with('success','Logout Successful');
    }

    public function myProfile()
    {
        $data['pageTitle'] = 'My Profile';
        $data['user'] = User::find(Auth::id());
        $data['divisions'] = Division::all();
        return view('user.my-profile')->with($data);
    }

    public function myProfileUpdate(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'nid' => 'required',
            'birth_of_date' => 'required',
            'mobile_number' => 'required',
        ]);
        $user = User::find(Auth::id());
        $user->name_en = $request->name_en;
        $user->name_bn = $request->name_bn;
        $user->email = $request->email;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->nid = $request->nid;
        $user->birth_of_date = $request->birth_of_date;
        $user->mobile_number = $request->mobile_number;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->upazila_id = $request->upazila_id;
        $user->post_office_id = $request->post_office_id;
        $user->village_id = $request->village_id;
        $user->save();
        return redirect()->back()->with('success', 'Updated Successfully');
    }

}
