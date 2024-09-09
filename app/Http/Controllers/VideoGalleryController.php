<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Team;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class VideoGalleryController extends Controller{
    public function index() {
        $galleries = VideoGallery::all();
        return view('administrator.video_gallery.all', compact('galleries'));
    }

    public function add() {
        return view('administrator.video_gallery.add');
    }

    public function addPost(Request $request) {
        //dd('Hasan');
        $request->validate([
            'product_id' => 'required',
            'youtube_link' => 'required',
            'status' => 'required'
        ]);

        $gallery = new VideoGallery();
        $gallery->product_id = $request->product_id;
        $gallery->youtube_link = $request->youtube_link;
        $gallery->status = $request->status;
        $gallery->save();

        return redirect()->route('video_gallery')->with('message', 'Video Gallery add successfully.');
    }

    public function edit(VideoGallery $videoGallery) {
        return view('administrator.video_gallery.edit', compact('videoGallery'));
    }

    public function editPost(VideoGallery $videoGallery, Request $request) {
        $request->validate([
            'product_id' => 'required',
            'youtube_link' => 'required',
            'status' => 'required'
        ]);

        $videoGallery->product_id = $request->product_id;
        $videoGallery->youtube_link = $request->youtube_link;
        $videoGallery->status = $request->status;
        $videoGallery->save();

        return redirect()->route('video_gallery')->with('message', 'Video Gallery edit successfully.');
    }
}
