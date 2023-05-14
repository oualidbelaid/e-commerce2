<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('admin/subcategories.index')->with('subcategories', $subcategories);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);
        $subcategory = SubCategory::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'The sub category created');
    }
    public function edit(SubCategory $category)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
        ]);
        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->save();
        return redirect()->back()->with('success', 'The sub category  update');
    }

    public function destroy($id)
    {

        $subcategory = SubCategory::find($id);
        $name = $subcategory->name;
        $subcategory->products()->sync([]);
        $subcategory->destroy($id);
        return redirect()->back()->with('success', 'The sub category ' . $name . ' deleted');
    }
}
