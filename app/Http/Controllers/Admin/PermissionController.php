<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.index',compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        return redirect()->route('admin.permissions.index')->with('status', 'Permission Created Successfullty!');
    }
    

    public function edit(Permission $permission)
    {
        return  view('admin.permission.edit' , compact('permission'));
    }

    public function update(UpdatePermissionRequest $request,Permission $permission)
    {
        $permission->update($request->all());
        return redirect()->route('admin.permissions.index')->with('status', 'Permission Updated Successfullty!');; 

    }
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('status', 'Permission Deleted Successfullty!');;
    }
}
