<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Division;
use App\Traits\ResponseStatusTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use ResponseStatusTrait;

    public function index(Request $request)
    {
        $data['pageTitle'] = 'Admin List';
        $data['navAdminActiveCLass'] = 'hover show';
        $data['subNavAdminListActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['admins'] = Admin::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else{
            $data['admins'] = Admin::paginate();
        }
        $data['roles'] = Role::all();
        return view('admin.admin.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Add Admin';
        $data['navAdminActiveCLass'] = 'hover show';
        $data['subNavAdminAddActiveCLass'] = 'active';
        $data['roles'] = Role::all();
        return view('admin.admin.add')->with($data);
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email',
            'mobile_number' => 'required|unique:admins,mobile_number',
            'password' => 'required|min:6'
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->mobile_number = $request->mobile_number;
        $admin->division = $request->division;
        $admin->district = $request->district;
        $admin->upazila = $request->upazila;
        $admin->post_office = $request->post_office;
        $admin->village = $request->village;
        $admin->role_id = $request->role_id;
        $admin->status = $request->status ?? 1;

        if ($request->has('image')){
            $image = saveImage('Admin', $request->image);
            $admin->image = $image;
        }

        $admin->save();

        return redirect()->route('admin.admin.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pageTitle'] = 'Admin Details';
        $data['navAdminActiveCLass'] = 'hover show';
        $data['subNavAdminListActiveCLass'] = 'active';
        $data['admin'] = Admin::findOrFail($id);
        $data['roles'] = Role::all();
        return view('admin.admin.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageTitle'] = 'Edit Admin';
        $data['navAdminActiveCLass'] = 'hover show';
        $data['subNavAdminListActiveCLass'] = 'active';
        $data['admin'] = Admin::findOrFail($id);
        $data['roles'] = Role::all();
        return view('admin.admin.edit')->with($data);
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
            'mobile_number' => 'required|unique:admins,mobile_number,'.$id,
            'password' => 'nullable|min:6'
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile_number = $request->mobile_number;
        $admin->division = $request->division;
        $admin->district = $request->district;
        $admin->upazila = $request->upazila;
        $admin->post_office = $request->post_office;
        $admin->village = $request->village;
        $admin->role_id = $request->role_id;
        $admin->status = $request->status ?? 1;

        if ($request->password){
            $admin->password = Hash::make($request->password);
        }

        if ($request->has('image')){
            deleteFile($admin->image);
            $image = saveImage('Admin', $request->image);
            $admin->image = $image;
        }

        $admin->save();

        return redirect()->route('admin.admin.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->image) {
            deleteFile(@$admin->image);
        }

        $admin->delete();

        return redirect()->back()->with('success', 'Admin Deleted Successfully');
    }

    public function getEmail(Request $request)
    {
        $admin = Admin::whereEmail($request->email)->first();
        if ($request->admin_id) {
            $admin = Admin::whereEmail($request->email)->where('id', '!=', $request->admin_id)->first();
        }

        if ($admin) {
            $response['admin'] = 1;
        } else {
            $response['admin'] = 0;
        }

        return $this->successApiResponse($response);
    }
}
