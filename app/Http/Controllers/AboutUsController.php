<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class AboutUsController extends Controller
{
    public function add() {
        $catalogue = AboutUs::first();
        return view('administrator.about_us.add',compact('catalogue'));
    }

    public function addPost(Request $request) {
        // dd($request->all());
        $check = AboutUs::first();
        if($check){
            $check->description = $request->description;
            if ($request->image){
                if (file_exists($check->image)){
                    unlink('public/'.$check->image);
                }
                $file = $request->file('image');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/about_us';
                $file->move($destinationPath, $filename);
                $path = 'uploads/about_us/' . $filename;
                $check->image = $path;
            }
            $check->save();
        }else{
            $newRow = new AboutUs();
            $newRow->description = $request->description;
            if ($request->image){
                $file = $request->file('image');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/about_us';
                $file->move($destinationPath, $filename);
                $path = 'uploads/about_us/' . $filename;
                $newRow->image = $path;
            }
            $newRow->save();
        }
        return redirect()->back()->with('message', 'About Us Updated successfully.');
    }
}
