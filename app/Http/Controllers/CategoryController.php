<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

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
        if ($request->banner_image){
            $file = $request->file('banner_image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/banner';
            $file->move($destinationPath, $filename);
            $path = 'uploads/banner/' . $filename;
            $category->banner_image = $path;
        }
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
        if ($request->banner_image){
            if (file_exists($category->banner_image ?? '')){
                unlink('public/'. $category->banner_image ?? '');
            }
            $file = $request->file('banner_image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/banner';
            $file->move($destinationPath, $filename);
            $path = 'uploads/banner/' . $filename;
            $category->banner_image = $path;
        }
        $category->status = $request->status;
        $category->save();

        return redirect()->route('category')->with('message', 'Category edit successfully.');
    }
}
