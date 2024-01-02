<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("category.index", compact("categories"));
    }

    public function create()
    {
        return view("category.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|unique:categories"
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with("success", "Category Addedd Successfully! ");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view("category.edit", compact("category"));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required"
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route("categories.index")->with("success", "Category Added SuccessFully! ");
    }
}
