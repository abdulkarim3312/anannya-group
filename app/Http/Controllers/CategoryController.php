<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('administrator.category.all', compact('categories'));
    }

    public function add() {
        return view('administrator.category.add');
    }

    public function addPost(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('category')->with('message', 'Category add successfully.');
    }

    public function edit(Category $category) {
        return view('administrator.category.edit', compact('category'));
    }

    public function editPost(Category $category, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required'
        ]);

        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('category')->with('message', 'Category edit successfully.');
    }
}
