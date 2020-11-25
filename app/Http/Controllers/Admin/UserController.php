<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index' ,compact('users'));
    }
     public function create(){
         return view('admin.user.create')->with('roles', Role::all());
     }

     public function store(StoreUserRequest $request)
     {
        //  dd($request->all());
         $user = User::create($request->except('role_list'));
         $user->roles()->attach($request->input('roles'));


         return redirect()->route('admin.users.index')->with('status', 'User Created Successfullty!');
     }

     public function edit(User $user)
     {
  return view('admin.user.edit',compact('user') )->with('roles' ,Role::all());
     }
 
     public function update(UpdateUserRequest $request,User $user)
     {
         $user->update($request->all());
         $user->roles()->sync($request->input('roles'));
         return redirect()->route('admin.users.index')->with('status', 'User Updated Successfullty!');
 
     }
     public function destroy(User $user)
     {
         $user->delete();
         return back()->with('status', 'User Deleted Successfullty!');;
     }

}
