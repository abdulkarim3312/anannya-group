<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Team;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class GalleryController extends Controller{
    public function index() {
        $galleries = Gallery::all();
        return view('administrator.gallery.all', compact('galleries'));
    }

    public function add() {
        return view('administrator.gallery.add');
    }

    public function addPost(Request $request) {
        //dd('Hasan');
        $request->validate([
            'product_id' => 'required',
            'image' => 'required|file',
            'status' => 'required'
        ]);

        $gallery = new Gallery();
        $gallery->product_id = $request->product_id;
        if ($request->image){
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/gallery';
            $file->move($destinationPath, $filename);
            $path = 'uploads/gallery/' . $filename;
            $gallery->image = $path;
        }
        $gallery->status = $request->status;
        $gallery->save();

        return redirect()->route('gallery')->with('message', 'Gallery add successfully.');
    }

    public function edit(Gallery $gallery) {
        return view('administrator.gallery.edit', compact('gallery'));
    }

    public function editPost(Gallery $gallery, Request $request) {
        $request->validate([
            'product_id' => 'required',
            'image' => 'nullable|file',
            'status' => 'required'
        ]);

        $gallery->product_id = $request->product_id;
        if ($request->image){
            // Upload Image
            if (file_exists($gallery->image)){
                unlink($gallery->image);
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/gallery';
            $file->move($destinationPath, $filename);
            $path = 'uploads/gallery/' . $filename;
            $gallery->image = $path;
        }
        $gallery->status = $request->status;
        $gallery->save();

        return redirect()->route('gallery')->with('message', 'Gallery edit successfully.');
    }
}
