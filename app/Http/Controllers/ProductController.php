<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories', 'subcategories')->get();
        return view("product.index", compact("products"));
    }

    public function create()
    {
        $categories = Category::get();
        $subcategories = SubCategory::get();
        return view("product.create", compact("categories", "subcategories"));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|unique:products|max:255",
            "price" => "required",
            "qty" => "required",
        ]);

        $product = new Product();
        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();

        return redirect()->route("products.index")->with("success", "Products Added  Successfully! ");
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('Product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required|unique:products|max:255",
            "price" => "required",
            "qty" => "required",
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();

        return redirect()->route("products.index")->with("success", "Products Updated Successfully! ");
    }

    public function GetSubCategory(Request $request)
    {
        $subcategories = SubCategory::where('cat_id', $request->id)->get();
        return response()->json($subcategories);
    }
}
