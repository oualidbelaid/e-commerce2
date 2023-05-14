<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin/categories.index')->with('categories', $categories);
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
        $category = Category::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'The category created');
    }
    public function edit(category $category)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'The category  update');
    }

    public function destroy($id)
    {

        $category = Category::find($id);
        $name = $category->name;
        $category->products()->sync([]);
        $category->destroy($id);
        return redirect()->back()->with('success', 'The category ' . $name . ' deleted');
    }
}
