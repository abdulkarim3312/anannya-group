<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class BannerController extends Controller{
    public function index() {
        $banners = Banner::all();
        return view('administrator.banner.all', compact('banners'));
    }

    public function add() {
        return view('administrator.banner.add');
    }

    public function addPost(Request $request) {
        //dd('Hasan');
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|file',
            'short_description' => 'required',
            'status' => 'required'
        ]);

        $banner = new Banner();
        $banner->title = $request->title;
        if ($request->image){
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/banner';
            $file->move($destinationPath, $filename);
            $path = 'uploads/banner/' . $filename;
            $banner->image = $path;
        }
        $banner->short_description = $request->short_description;
        $banner->status = $request->status;
        $banner->save();

        return redirect()->route('banner')->with('message', 'Banner add successfully.');
    }

    public function edit(Banner $banner) {
        return view('administrator.banner.edit', compact('banner'));
    }

    public function editPost(Banner $banner, Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file',
            'short_description' => 'required',
            'status' => 'required'
        ]);

        $banner->title = $request->title;
        //dd($request->file('image'));
        if ($request->image){
            // Upload Image
            if (file_exists($banner->image)){
                unlink($banner->image);
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/banner';
            $file->move($destinationPath, $filename);
            $path = 'uploads/banner/' . $filename;
            $banner->image = $path;
        }
        $banner->short_description = $request->short_description;
        $banner->status = $request->status;
        $banner->save();

        return redirect()->route('banner')->with('message', 'Banner edit successfully.');
    }
}
