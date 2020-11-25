<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create')->with('permissions',Permission::all());
    }

    public function store(StoreRoleRequest $request)
    {
        // dd($request->all());
        $role = Role::create($request->all());
        $role->permissions()->attach($request->permission_list);
        return redirect()->route('admin.roles.index')->with('status', 'Role Created Successfullty!');
    }
    

    public function edit(Role $role)
    {
 return view('admin.role.edit' , compact('role'))->with('permissions' ,Permission::all());
    }

    public function update(UpdateRoleRequest $request,Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->permission_list);
        return redirect()->route('admin.roles.index')->with('status', 'Role Updated Successfullty!');

    }
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('status', 'Role Deleted Successfullty!');;
    }
}
