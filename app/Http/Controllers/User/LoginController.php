<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use App\Models\UserPermanentAddress;
use App\Models\UserPresentAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showRegistrationForm()
    {
        $data['pageTitle'] = 'Registration-Form';
        return view('user.auth.registration')->with($data);
    }

    public function registration(Request $request)
    {
        $data['pageTitle'] = 'Verification';
        $user = User::where('email', $request->email)->orWhere('mobile_number', $request->mobile_number)->first();
        if ($user) {
            if ($user->status == USER_STATUS_NOT_VERIFIED) {
                $user->delete();
            }
        }

        $request->validate([
            'email' => 'required_without:mobile_number|unique:users,email',
//            'mobile_number' => 'required_without:email|unique:users,mobile_number',
            'mobile_number' => 'required|unique:users,mobile_number',
            'password' => 'required|min:6'
        ],[
            'email.required_without' => 'ইমেইল নম্বর অথবা মোবাইল নম্বর নম্বর দিতে হবে',
            'mobile_number.required_without' => 'ইমেইল নম্বর অথবা মোবাইল নম্বর নম্বর দিতে হবে',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->password = Hash::make($request->password);
        $verify_code = rand(10000, 999999);
        $user->verify_code = $verify_code;
        $user->status = USER_STATUS_NOT_VERIFIED;
        $user->save();

        return redirect()->route('user.getRegistration.verify', [$user->id, encrypt($request->password)]);
    }

    public function getRegistrationVerification($id, $pass)
    {
        $user = User::find($id);
        $data['user_id'] = $user->id;
        $data['mobile_number'] = $user->mobile_number;
        $data['password'] = decrypt($pass);

        return view('user.auth.registration-verify')->with($data);
    }

    public function registrationVerification(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'mobile_number' => 'required',
            'vc_1' => 'required',
            'vc_2' => 'required',
            'vc_3' => 'required',
            'vc_4' => 'required',
            'vc_5' => 'required',
            'vc_6' => 'required',
            'password' => 'required',
        ]);

        $verify_code = $request->vc_1 . $request->vc_2 . $request->vc_3 . $request->vc_4 . $request->vc_5 . $request->vc_6;

        $user = User::where(['id' => $request->user_id, 'mobile_number' => $request->mobile_number, 'verify_code' => $verify_code])->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Verification code is Wrong!');
        }

        $user->status = USER_STATUS_ACTIVE;
        $user->save();

        if(auth()->attempt($request->only('mobile_number', 'password'))){
            return redirect()->route('user.dashboard')->with('success','Login Successful');
        }

        return redirect()->route('user.login')->with('error','Invalid Credentials');
    }

    public function showLoginForm()
    {
        $data['pageTitle'] = 'User-Login';
        return view('user.auth.login')->with($data);
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
        $data['user'] = Auth::user();
        $data['divisions'] = Division::all();
        $data['permanentAddress'] = UserPermanentAddress::where('user_id', Auth::id())->first();
        if(!$data['permanentAddress']) {
            $data['permanentAddress'] = new UserPermanentAddress();
            $data['permanentAddress']->user_id = Auth::id();
            $data['permanentAddress']->save();
        }
        $data['presentAddress'] = UserPresentAddress::where('user_id', Auth::id())->first();
        if(!$data['presentAddress']) {
            $data['presentAddress'] = new UserPresentAddress();
            $data['presentAddress']->user_id = Auth::id();
            $data['presentAddress']->save();
        }
        return view('user.my-profile')->with($data);
    }

    public function myProfileUpdate(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            'father_name_en' => 'required',
            'father_name_bn' => 'required',
            'mother_name_en' => 'required',
            'mother_name_bn' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'mobile_number' => 'required|unique:users,mobile_number,' . Auth::id(),
            'password' => 'min:6',
            'birth_certificate_no' => 'required_without:nid',
            'birth_of_date' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'monthly_income' => 'required',
            'yearly_income' => 'required',
            'profession' => 'required',
            'landless_status' => 'required',
            'handicapped_status' => 'required',
            'river_break_status' => 'required',
            'freedom_son_status' => 'required',
        ],
        [
            'birth_certificate_no.required_without' => 'জাতীয় পরিচয় পত্র নম্বর অথবা জন্ম সনদ নম্বর দিতে হবে'
        ]);

        DB::beginTransaction();
        try {
            $user = User::find(Auth::id());
            $user->name_en = $request->name_en;
            $user->name_bn = $request->name_bn;
            $user->father_name_en = $request->father_name_en;
            $user->father_name_bn = $request->father_name_bn;
            $user->mother_name_en = $request->mother_name_en;
            $user->mother_name_bn = $request->mother_name_bn;
            $user->mobile_number = $request->mobile_number;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->nid = $request->nid;
            $user->birth_certificate_no = $request->birth_certificate_no;
            $user->passport_no = $request->passport_no;
            $user->birth_of_date = $request->birth_of_date;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->marital_status = $request->marital_status;
            $user->monthly_income = $request->monthly_income;
            $user->yearly_income = $request->yearly_income;
            $user->profession = $request->profession;
            $user->landless_status = $request->landless_status;
            $user->handicapped_status = $request->handicapped_status;
            $user->river_break_status = $request->river_break_status;
            $user->freedom_son_status = $request->freedom_son_status;
            if ($request->has('image')){
                deleteFile($user->image);
                $image = saveImage('User', $request->image);
                $user->image = $image;
            }
            $user->save();

            $presentAddress = UserPresentAddress::where('user_id', $user->id)->first();
            if(!$presentAddress) {
                $presentAddress = new UserPresentAddress();
            }
            $presentAddress->user_id = $user->id;
            $presentAddress->pre_holding = $request->pre_holding;
            $presentAddress->pre_village = $request->pre_village;
            $presentAddress->pre_ward = $request->pre_ward;
            $presentAddress->pre_post_office = $request->pre_post_office;
            $presentAddress->pre_upazila = $request->pre_upazila;
            $presentAddress->pre_district = $request->pre_district;
            $presentAddress->pre_division = $request->pre_division;
            $presentAddress->save();

            $permanentAddress = UserPermanentAddress::where('user_id', $user->id)->first();
            if(!$permanentAddress) {
                $permanentAddress = new UserPermanentAddress();
            }
            $permanentAddress->user_id = $user->id;
            $permanentAddress->per_holding = $request->per_holding;
            $permanentAddress->per_village = $request->per_village;
            $permanentAddress->per_ward = $request->per_ward;
            $permanentAddress->per_post_office = $request->per_post_office;
            $permanentAddress->per_upazila = $request->per_upazila;
            $permanentAddress->per_district = $request->per_district;
            $permanentAddress->per_division = $request->per_division;
            $permanentAddress->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong! Please try again');
        }

        return redirect()->back()->with('success', 'Updated Successfully');
    }
}
