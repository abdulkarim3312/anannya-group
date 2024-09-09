<?php

namespace App\Http\Controllers;

use App\Helpers\UploadHelper;
use App\Models\CategoryBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class CategoryBannerController extends Controller
{
    public function add() {
        $categoryBanner = CategoryBanner::first();
        return view('administrator.category_banner.add',compact('categoryBanner'));
    }

    public function addPost(Request $request) {
        // dd($request->all());
        $categoryBanner = CategoryBanner::first();

        if($categoryBanner){
            if ($request->category_banner_image_one){
                // Upload Image
                if (file_exists($categoryBanner->category_banner_image_one)){
                    unlink($categoryBanner->category_banner_image_one);
                }

                $file = $request->file('category_banner_image_one');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBanner->category_banner_image_one = $path;

            }
            if ($request->category_banner_image_two){
                // Upload Image
                if (file_exists($categoryBanner->category_banner_image_two)){
                    unlink($categoryBanner->category_banner_image_two);
                }

                $file = $request->file('category_banner_image_two');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBanner->category_banner_image_two = $path;

            }
            if ($request->category_banner_image_three){
                // Upload Image
                if (file_exists($categoryBanner->category_banner_image_three)){
                    unlink($categoryBanner->category_banner_image_three);
                }

                $file = $request->file('category_banner_image_three');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBanner->category_banner_image_three = $path;

            }
            if ($request->category_banner_image_four){
                // Upload Image
                if (file_exists($categoryBanner->category_banner_image_four)){
                    unlink($categoryBanner->category_banner_image_four);
                }

                $file = $request->file('category_banner_image_four');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBanner->category_banner_image_four = $path;

            }
            if ($request->category_banner_image_five){
                // Upload Image
                if (file_exists($categoryBanner->category_banner_image_five)){
                    unlink($categoryBanner->category_banner_image_five);
                }

                $file = $request->file('category_banner_image_five');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBanner->category_banner_image_five = $path;

            }
            if ($request->category_banner_image_six){
                // Upload Image
                if (file_exists($categoryBanner->category_banner_image_six)){
                    unlink($categoryBanner->category_banner_image_six);
                }

                $file = $request->file('category_banner_image_six');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBanner->category_banner_image_six = $path;

            }
            // if (!is_null($request->category_banner_image_one)) {
            //     $categoryBanner->category_banner_image_one = UploadHelper::update('category_banner_image', $request->category_banner_image_one, Str::random(15), 'public/uploads/category_banner_image/', $categoryBanner->category_banner_image_one);
            // }
            // if (!is_null($request->category_banner_image_two)) {
            //     $categoryBanner->category_banner_image_two = UploadHelper::update('category_banner_image', $request->category_banner_image_two, Str::random(15), 'public/uploads/category_banner_image/', $categoryBanner->category_banner_image_two);
            // }
            // if (!is_null($request->category_banner_image_three)) {
            //     $categoryBanner->category_banner_image_three = UploadHelper::update('category_banner_image', $request->category_banner_image_three, Str::random(15), 'public/uploads/category_banner_image/', $categoryBanner->category_banner_image_three);
            // }
            // if (!is_null($request->category_banner_image_four)) {
            //     $categoryBanner->category_banner_image_four = UploadHelper::update('category_banner_image', $request->category_banner_image_four, Str::random(15), 'public/uploads/category_banner_image/', $categoryBanner->category_banner_image_four);
            // }
            // if (!is_null($request->category_banner_image_five)) {
            //     $categoryBanner->category_banner_image_five = UploadHelper::update('category_banner_image', $request->category_banner_image_five, Str::random(15), 'public/uploads/category_banner_image/', $categoryBanner->category_banner_image_five);
            // }
            // if (!is_null($request->category_banner_image_six)) {
            //     $categoryBanner->category_banner_image_six = UploadHelper::update('category_banner_image', $request->category_banner_image_six, Str::random(15), 'public/uploads/category_banner_image/', $categoryBanner->category_banner_image_six);
            // }
            // if (!is_null($request->category_banner_image_seven)) {
            //     $categoryBanner->category_banner_image_seven = UploadHelper::update('category_banner_image', $request->category_banner_image_seven, Str::random(15), 'public/uploads/category_banner_image/', $categoryBanner->category_banner_image_seven);
            // }

            $categoryBanner->save();
            return redirect()->back()->with('message', 'Category Banner Updated successfully.');
        }else{
            $categoryBannerNew = new CategoryBanner();
            if ($request->category_banner_image_one){
                $file = $request->file('category_banner_image_one');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBannerNew->category_banner_image_one = $path;

            }
            if ($request->category_banner_image_two){
                $file = $request->file('category_banner_image_two');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBannerNew->category_banner_image_two = $path;

            }
            if ($request->category_banner_image_three){
                $file = $request->file('category_banner_image_three');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBannerNew->category_banner_image_three = $path;
            }
            if ($request->category_banner_image_four){
                $file = $request->file('category_banner_image_four');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBannerNew->category_banner_image_four = $path;
            }
            if ($request->category_banner_image_five){
                $file = $request->file('category_banner_image_five');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBannerNew->category_banner_image_five = $path;
            }
            if ($request->category_banner_image_six){
                $file = $request->file('category_banner_image_six');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/category_banner_image';
                $file->move($destinationPath, $filename);
                $path = 'uploads/category_banner_image/' . $filename;
                $categoryBannerNew->category_banner_image_six = $path;
            }


            // if (!is_null($request->category_banner_image_one)) {
            //     $categoryBannerNew->category_banner_image_one = UploadHelper::upload('category_banner_image', $request->category_banner_image_one, Str::random(15), 'public/uploads/category_banner_image/');
            // }
            // if (!is_null($request->category_banner_image_two)) {
            //     $categoryBannerNew->category_banner_image_two = UploadHelper::upload('category_banner_image', $request->category_banner_image_two, Str::random(15), 'public/uploads/category_banner_image/');
            // }
            // if (!is_null($request->category_banner_image_three)) {
            //     $categoryBannerNew->category_banner_image_three = UploadHelper::upload('category_banner_image', $request->category_banner_image_three, Str::random(15), 'public/uploads/category_banner_image/');
            // }
            // if (!is_null($request->category_banner_image_four)) {
            //     $categoryBannerNew->category_banner_image_four = UploadHelper::upload('category_banner_image', $request->category_banner_image_four, Str::random(15), 'public/uploads/category_banner_image/');
            // }
            // if (!is_null($request->category_banner_image_five)) {
            //     $categoryBannerNew->category_banner_image_five = UploadHelper::upload('category_banner_image', $request->category_banner_image_five, Str::random(15), 'public/uploads/category_banner_image/');
            // }
            // if (!is_null($request->category_banner_image_six)) {
            //     $categoryBannerNew->category_banner_image_six = UploadHelper::upload('category_banner_image', $request->category_banner_image_six, Str::random(15), 'public/uploads/category_banner_image/');
            // }
            // if (!is_null($request->category_banner_image_seven)) {
            //     $categoryBannerNew->category_banner_image_seven = UploadHelper::upload('category_banner_image', $request->category_banner_image_seven, Str::random(15), 'public/uploads/category_banner_image/');
            // }

            $categoryBannerNew->save();
            return redirect()->back()->with('message', 'Category Banner add successfully.');
        }
    }
}
