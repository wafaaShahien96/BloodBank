<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorebloodTypeRequest;
use Illuminate\Http\Request;
use App\Models\BloodType;

class BloodTypeController extends Controller
{
    public function index()
    {
        $bloodTypes = BloodType::all();
        return view('admin.bloodType.index',compact('bloodTypes'));
    }

    public function create()
    {
        return view('admin.bloodType.create');
    }

    public function store(StorebloodTypeRequest $request)
    {
        $bloodType = BloodType::create($request->all());

        return redirect()->route('admin.bloodtype.index')->with('status', 'BloodType Created Successfullty!');
    }
}
