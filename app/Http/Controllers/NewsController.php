<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\ImageFile;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;
use File;

class NewsController extends Controller
{
    public function index() {
        $news = News::orderBy('created_at','desc')->get();
        return view('administrator.news.all', compact('news'));
    }

    public function imageUploads(Request $request)
    {
        $request->validate([
            'file' => 'required|image'
        ]);

        $file = $request->file('file');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/blog';
        $file->move($destinationPath, $filename);

        $path = 'uploads/blog/'.$filename;

        $image = ImageFile::create([
            'path' => $path
        ]);

        $image->fullPath = asset($path);

        return response()->json(['success' => true, 'data' => $image->toArray()]);
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

        // Upload Image
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/blog';
        $file->move($destinationPath, $filename);
        // Thumbs
        $img = Image::make($destinationPath.'/'.$filename);
        $img->resize(900,500);
        $img->save(public_path('uploads/blog/thumbs/'.$filename), 50);
        $thumbsPath = 'uploads/blog/thumbs/'.$filename;

        $img2 = Image::make($destinationPath.'/'.$filename);
        $img2->save(public_path('uploads/blog/'.$filename), 50);
        $fullPath = 'uploads/blog/'.$filename;

        $news = new News();
        $news->image = $fullPath;
        $news->thumbs = $thumbsPath;
        $news->author = $request->author;
        $news->title = $request->title;
        $news->type = $request->type;
        $news->slug = preg_replace('/\s+/', '-', strtolower($request->title));
        $news->description = $request->description;
        $news->status = $request->status;
        $news->user_id = Auth::id();
        $news->save();

        if ($request->imagesId) {
            for ($i = 0; $i < sizeof($request->imagesId); $i++) {
                $image = ImageFile::where('id', $request->imagesId[$i])->first();

                $filename = Uuid::uuid1()->toString();
                $ext = pathinfo($image->path, PATHINFO_EXTENSION);

                $thumbsSavePath = 'uploads/blog/thumbs/' . $filename . '.' . $ext;

                // Thumbs Image
                $thumb = Image::make(public_path($image->path))->resize(1280, 553);
                $thumb->save(public_path($thumbsSavePath), 50);

                $image->news_id = $news->id;
                $image->sort = $i + 1;
                $image->thumbs = $thumbsSavePath;
                $image->save();
            }
        }

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
        if ($request->file('image')) {

            if(File::exists(public_path($news->image))){
                File::delete(public_path($news->image));
            }
            if(File::exists(public_path($news->thumbs))){
                File::delete(public_path($news->thumbs));
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/blog';
            $file->move($destinationPath, $filename);
            // Thumbs
            $img = Image::make($destinationPath.'/'.$filename);
            $img->resize(900,500);
            $img->save(public_path('uploads/blog/thumbs/'.$filename), 50);
            $thumbsPath = 'uploads/blog/thumbs/'.$filename;

            $img2 = Image::make($destinationPath.'/'.$filename);
            $img2->save(public_path('uploads/blog/'.$filename), 50);
            $fullPath = 'uploads/blog/'.$filename;

            $news->image = $fullPath;
            $news->thumbs = $thumbsPath;

        }


        $news->type = $request->type;
        $news->author = $request->author;
        $news->title = $request->title;
        $news->slug = preg_replace('/\s+/', '-', strtolower($request->title));
        $news->description = $request->description;
        $news->status = $request->status;
        $news->save();

        if ($request->imagesId) {
            for ($i = 0; $i < sizeof($request->imagesId); $i++) {
                $image = ImageFile::where('id', $request->imagesId[$i])->first();

                if ($image->news_id == null || $image->thumbs == null) {
                    $filename = Uuid::uuid1()->toString();
                    $ext = pathinfo($image->path, PATHINFO_EXTENSION);

                    $thumbsSavePath = 'uploads/blog/thumbs/' . $filename . '.' . $ext;

                    // Thumbs Image
                    $thumb = Image::make(public_path($image->path))->resize(1280, 553);
                    $thumb->save(public_path($thumbsSavePath), 50);

                    $image->thumbs = $thumbsSavePath;
                }

                $image->news_id = $news->id;
                $image->sort = $i + 1;
                $image->save();
            }

            // Delete Images
            $images = ImageFile::where('news_id', $news->id)
                ->whereNotIn('id', $request->imagesId)
                ->get();

            foreach ($images as $image) {
                if ($image->path != null)
                    unlink(public_path($image->path));

                if ($image->thumbs != null)
                    unlink(public_path($image->thumbs));

                $image->delete();
            }
        }

        return redirect()->route('news')->with('message', 'News update successfully.');
    }

    public function delete(Request $request) {
        $news = News::find($request->id);

        if(File::exists(public_path($news->image))){
            File::delete(public_path($news->image));
        }
        if(File::exists(public_path($news->thumbs))){
            File::delete(public_path($news->thumbs));
        }

        $news->delete();
    }
}
