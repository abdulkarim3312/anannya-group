<?php

namespace App\Http\Controllers;

use App\Helpers\UploadHelper;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\ImageFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;
use File;

class NewsController extends Controller
{
    public function index() {
        $news = News::orderBy('created_at','desc')->get();
        return view('administrator.news.all', compact('news'));
    }

    public function add() {
        return view('administrator.news.add');
    }

    public function addPost(Request $request) {

        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required|max:50000',
            'title' => 'required|max:255|unique:news',
            'author' => 'nullable|max:255',
            'type' => 'required',
            'status' => 'required',
        ]);

        $news = new News();
        $news->author = $request->author;
        $news->title = $request->title;
        $news->type = $request->type;
        $news->slug = preg_replace('/\s+/', '-', strtolower($request->title));
        $news->description = $request->description;
        $news->status = $request->status;
        $news->user_id = Auth::id();

        // Upload Image
        if ($request->image){
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/new_and_event';
            $file->move($destinationPath, $filename);
            $path = 'uploads/new_and_event/' . $filename;
            $news->image = $path;
        }
        $news->save();

        return redirect()->route('news')->with('message', 'News add successfully.');
    }

    public function edit(News $news) {
        return view('administrator.news.edit', compact('news'));
    }

    public function editPost(News $news, Request $request) {

        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'description' => 'required|max:50000',
            'title' => 'required|max:255|unique:news,id,'.$news->id,
            'author' => 'nullable|max:255',
            'type' => 'required',
            'status' => 'required',
        ]);

        $news->type = $request->type;
        $news->author = $request->author;
        $news->title = $request->title;
        $news->slug = preg_replace('/\s+/', '-', strtolower($request->title));
        $news->description = $request->description;
        $news->status = $request->status;
        if ($request->image){
            if (file_exists($news->image)){
                unlink($news->image);
            }
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/new_and_event';
            $file->move($destinationPath, $filename);
            $path = 'uploads/new_and_event/' . $filename;
            $news->image = $path;
        }
        $news->save();

        return redirect()->route('news')->with('message', 'News update successfully.');
    }

    public function delete(Request $request) {
        $news = News::find($request->id);
        if (file_exists($news->image)){
            unlink($news->image);
        }
        $news->delete();
    }
}
