<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreGovernorateRequest;
use App\Http\Requests\UpdateGovernorateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;

class GovernorateController extends Controller
{
    public function index()
    {

        $governorates = Governorate::all();
        return view('admin.governorate.index',compact('governorates'));
    }

    public function create()
    {
        return view('admin.governorate.create');
    }

    public function store(StoreGovernorateRequest $request)
    {
        $governorate = Governorate::create($request->all());

        return redirect()->route('admin.governorates.index')->with('status', 'governorate Created Successfullty!');
    }
    public function show($id)
    {
        //
    }

    public function edit(Governorate $governorate)
    {
        return  view('admin.governorate.edit' , compact('governorate'));
    }

    public function update(UpdateGovernorateRequest $request,Governorate $governorate)
    {
        $governorate->update($request->all());
        return redirect()->route('admin.governorates.index')->with('status', 'governorate Updated Successfullty!');

    }
    public function destroy(Governorate $governorate)
    {
        $governorate->delete();
        return back()->with('status', 'governorate Deleted Successfully!');
    }
}

