<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller{
    public function index() {
        $subcategories = ProductSubCategory::all();
        return view('purchase.product_subcategory.all', compact('subcategories'));
    }
    public function add() {
        $categories = ProductCategory::where('status',1)->get();
        return view('purchase.product_subcategory.add',compact('categories'));
    }
    public function addPost(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|numeric',
            'status' => 'required'
        ]);

        $subcategory = new ProductSubCategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->status = $request->status;
        $subcategory->save();

        return redirect()->route('product_sub_category')->with('message', 'SubCategory add successfully.');
    }
    public function edit(ProductSubCategory $productSubCategory) {
        $categories = ProductCategory::where('status',1)->get();
        return view('purchase.product_subcategory.edit', compact('productSubCategory','categories'));
    }
    public function editPost(ProductSubCategory $productSubCategory, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|numeric',
            'status' => 'required'
        ]);

        $productSubCategory->name = $request->name;
        $productSubCategory->category_id = $request->category;
        $productSubCategory->status = $request->status;
        $productSubCategory->save();

        return redirect()->route('product_sub_category')->with('message', 'SubCategory edit successfully.');
    }
}
