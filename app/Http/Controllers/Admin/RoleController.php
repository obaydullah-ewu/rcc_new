<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = 'Roles';
        $data['navDesignationRoleActiveCLass'] = 'hover show';
        $data['subNavRoleListActiveCLass'] = 'active';

        $search_string = $request['search_string'];

        if ($search_string !== null) {
            $data['roles'] = Role::where('name', 'LIKE', "%{$search_string}%")->paginate();
        } else{
            $data['roles'] = Role::paginate();
        }

        return view('admin.role.list')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['navRoleActiveCLass'] = 'hover show';
        $data['subNavRoleListActiveCLass'] = 'active';
        $data['roles'] = Role::find($id);
        $data['permissions'] = Permission::all();

        $data['parentSelectedPermissions'] = DB::table('role_has_permissions')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', '=', $id)
            ->where('permissions.submodule_id', '=', 0)->get();


        $data['childSelectedPermissions'] = DB::table('role_has_permissions')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', '=', $id)
            ->where('permissions.submodule_id', '!=', 0)
            ->get();

        return view('admin.role.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $data['role'] = Role::find($id);
        $data['permissions'] = Permission::all();

        $data['parentSelectedPermissions'] = DB::table('role_has_permissions')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', '=', $id)
            ->where('permissions.submodule_id', '=', 0)->get();


        $data['childSelectedPermissions'] = DB::table('role_has_permissions')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', '=', $id)
            ->where('permissions.submodule_id', '!=', 0)
            ->get();

        return view('admin.role.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $permissions = [];
        if (array_key_exists('group-a', $request->all())) {
            foreach ($request['group-a'] as $group) {
                if (array_key_exists('permissions', $group)) {
                    foreach ($group['permissions'] as $permission) {
                        array_push($permissions, $permission);
                    }
                }
                if (array_key_exists('mother-permissions', $group)) {
                    array_push($permissions, $group['mother-permissions']);
                }
            }
        }


        $role = Role::find($id);
        $role->name = $request->get('name');
        $role->save();
        $role->syncPermissions();

        foreach ($permissions as $item) {
            $role->givePermissionTo($item);
        }
        return redirect()->route('admin.role.index')->with('success', 'Role update successfully');
    }

    public function getsubmodule($id)
    {
        $permissions = Permission::where("submodule_id", $id)->get();
        $permission = Permission::where('id', $id)->first();
        return response()->json(['permission' => $permission, 'permissions' => $permissions]);
    }
}
