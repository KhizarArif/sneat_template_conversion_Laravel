<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::get(); 
        return view("subcategory.index", compact("subcategories"));
    }

    public function create()
    {
        $categories = Category::get();
        return view("subcategory.create", compact("categories"));
    }

    public function store(Request $request)
    { 
        $this->validate($request, [
            "name" => 'required|unique:subcategories|max:255'
        ]);

        $subcategory = new SubCategory(); 
        $subcategory->name = $request->name;
        $subcategory->cat_id = $request->cat_id;
        $subcategory->save();

        return redirect()->route("subcategories.index")->with("success", "Sub Categories Added Successfully! ");
    }
}
