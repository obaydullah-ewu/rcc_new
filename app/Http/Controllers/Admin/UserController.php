<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data['divisions'] = Division::all();
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
            'father_name' => 'required',
            'mother_name' => 'required',
            'nid' => 'required',
            'birth_of_date' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_number' => 'required|unique:users,mobile_number',
            'password' => 'required|min:6'
        ]);
        $user = new User();
        $user->name_en = $request->name_en;
        $user->name_bn = $request->name_bn;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
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
        if ($request->has('image')){
            $image = saveImage('User', $request->image);
            $user->image = $image;
        }
        $user->save();

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
        $data['divisions'] = Division::all();
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
        $data['divisions'] = Division::all();
        $data['user'] = User::findOrFail($id);
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
            'father_name' => 'required',
            'mother_name' => 'required',
            'nid' => 'required',
            'birth_of_date' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'required|unique:users,mobile_number,'.$id,
        ]);
        $user = User::find($id);
        $user->name_en = $request->name_en;
        $user->name_bn = $request->name_bn;
        $user->email = $request->email;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }
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
        if ($request->has('image')){
            deleteFile($user->image);
            $image = saveImage('User', $request->image);
            $user->image = $image;
        }
        $user->save();

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
