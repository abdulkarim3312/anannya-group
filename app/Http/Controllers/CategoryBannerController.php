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
        $categoryBanner = CategoryBanner::first();
        if($categoryBanner){
            if (!is_null($request->category_banner_image_one)) {
                $categoryBanner->category_banner_image_one = UploadHelper::update('category_banner_image', $request->category_banner_image_one, Str::random(15), 'uploads/category_banner_image/', $categoryBanner->category_banner_image_one);
            }
            if (!is_null($request->category_banner_image_two)) {
                $categoryBanner->category_banner_image_two = UploadHelper::update('category_banner_image', $request->category_banner_image_two, Str::random(15), 'uploads/category_banner_image/', $categoryBanner->category_banner_image_two);
            }
            if (!is_null($request->category_banner_image_three)) {
                $categoryBanner->category_banner_image_three = UploadHelper::update('category_banner_image', $request->category_banner_image_three, Str::random(15), 'uploads/category_banner_image/', $categoryBanner->category_banner_image_three);
            }
            if (!is_null($request->category_banner_image_four)) {
                $categoryBanner->category_banner_image_four = UploadHelper::update('category_banner_image', $request->category_banner_image_four, Str::random(15), 'uploads/category_banner_image/', $categoryBanner->category_banner_image_four);
            }
            if (!is_null($request->category_banner_image_five)) {
                $categoryBanner->category_banner_image_five = UploadHelper::update('category_banner_image', $request->category_banner_image_five, Str::random(15), 'uploads/category_banner_image/', $categoryBanner->category_banner_image_five);
            }
            if (!is_null($request->category_banner_image_six)) {
                $categoryBanner->category_banner_image_six = UploadHelper::update('category_banner_image', $request->category_banner_image_six, Str::random(15), 'uploads/category_banner_image/', $categoryBanner->category_banner_image_six);
            }

            $categoryBanner->save();
            return redirect()->back()->with('message', 'Category Banner Updated successfully.');
        }else{
            $categoryBannerNew = new CategoryBanner();

            if (!is_null($request->category_banner_image_one)) {
                $categoryBannerNew->category_banner_image_one = UploadHelper::upload('category_banner_image', $request->category_banner_image_one, Str::random(15), 'uploads/category_banner_image/');
            }
            if (!is_null($request->category_banner_image_two)) {
                $categoryBannerNew->category_banner_image_two = UploadHelper::upload('category_banner_image', $request->category_banner_image_two, Str::random(15), 'uploads/category_banner_image/');
            }
            if (!is_null($request->category_banner_image_three)) {
                $categoryBannerNew->category_banner_image_three = UploadHelper::upload('category_banner_image', $request->category_banner_image_three, Str::random(15), 'uploads/category_banner_image/');
            }
            if (!is_null($request->category_banner_image_four)) {
                $categoryBannerNew->category_banner_image_four = UploadHelper::upload('category_banner_image', $request->category_banner_image_four, Str::random(15), 'uploads/category_banner_image/');
            }
            if (!is_null($request->category_banner_image_five)) {
                $categoryBannerNew->category_banner_image_five = UploadHelper::upload('category_banner_image', $request->category_banner_image_five, Str::random(15), 'uploads/category_banner_image/');
            }
            if (!is_null($request->category_banner_image_six)) {
                $categoryBannerNew->category_banner_image_six = UploadHelper::upload('category_banner_image', $request->category_banner_image_six, Str::random(15), 'uploads/category_banner_image/');
            }

            $categoryBannerNew->save();
            return redirect()->back()->with('message', 'Category Banner add successfully.');
        }
    }
}
