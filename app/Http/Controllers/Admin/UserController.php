<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use App\Models\UserPermanentAddress;
use App\Models\UserPresentAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = 'ব্যবহারকারীর তালিকা';
        $data['navUserActiveCLass'] = 'hover show';
        $data['subNavUserListActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['users'] = User::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else{
            $data['users'] = User::paginate();
        }

        return view('admin.user.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'ব্যবহারকারী যোগ করুন';
        $data['navUserActiveCLass'] = 'hover show';
        $data['subNavAddUserActiveCLass'] = 'active';
        $data['divisions']  = Division::all();
        return view('admin.user.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            'father_name_en' => 'required',
            'father_name_bn' => 'required',
            'mother_name_en' => 'required',
            'mother_name_bn' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_number' => 'required|unique:users,mobile_number',
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
        ], [
            'birth_certificate_no.required_without' => 'জাতীয় পরিচয় পত্র নম্বর অথবা জন্ম সনদ নম্বর দিতে হবে'
        ]);

        DB::beginTransaction();
        try {
            $user = new User();
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

        return redirect()->route('admin.user.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pageTitle'] = 'ব্যবহারকারীর বৃত্যান্ত';
        $data['navUserActiveCLass'] = 'hover show';
        $data['subNavAddUserActiveCLass'] = 'active';
        $data['user'] = User::findOrFail($id);
        return view('admin.user.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageTitle'] = 'ব্যবহারকারী সম্পাদনা করুন';
        $data['navUserActiveCLass'] = 'hover show';
        $data['subNavAddUserActiveCLass'] = 'active';
        $data['user'] = User::findOrFail($id);
        $data['divisions'] = Division::all();
        $data['permanentAddress'] = UserPermanentAddress::where('user_id', $id)->first();
        if(!$data['permanentAddress']) {
            $data['permanentAddress'] = new UserPermanentAddress();
            $data['permanentAddress']->user_id = $id;
            $data['permanentAddress']->save();
        }
        $data['presentAddress'] = UserPresentAddress::where('user_id', $id)->first();
        if(!$data['presentAddress']) {
            $data['presentAddress'] = new UserPresentAddress();
            $data['presentAddress']->user_id = $id;
            $data['presentAddress']->save();
        }
        return view('admin.user.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            'father_name_en' => 'required',
            'father_name_bn' => 'required',
            'mother_name_en' => 'required',
            'mother_name_bn' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'required|unique:users,mobile_number,' . $id,
            'password' => 'nullable|min:6',
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
            $user = User::find($id);
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

        return redirect()->route('admin.user.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
