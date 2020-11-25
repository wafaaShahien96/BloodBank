<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('status', 'Category Created Successfullty!');
    }
    public function show(Category $category)
    {
       return view('admin.category.show' , compact('category'));
    }

    public function edit(Category $category)
    {
        return  view('admin.category.edit' , compact('category'));
    }

    public function update(UpdateCategoryRequest $request,Category $category)
    {
        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('status', 'Category Updated Successfullty!');; 

    }
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('status', 'Category Deleted Successfullty!');;
    }
}
