<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\CategoryBanner;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Team;
use App\Models\VideoGallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontHomeController extends Controller{
    public function home(){
        $banners = Banner::where('status',1)->get();
        $teams = Team::where('status',1)->get();
        $clients = Client::where('status',1)->get();
        $categories = Category::get();
        $categories_one = Category::where('id', 1)->first();
        $categories_two = Category::where('id', 2)->first();
        $categories_three = Category::where('id', 3)->first();
        $categories_four = Category::where('id', 4)->first();
        $categories_five = Category::where('id', 5)->first();
        $categories_six = Category::where('id', 6)->first();
        $categories_seven = Category::where('id', 8)->first();
        $videoGalleries = VideoGallery::where('product_id',0)->where('status',1)->get();
        $certificates = Certificate::where('status',1)->get();
        $products=Product::with('category')->where('category_id',1)->get();
        $products_two=Product::with('category')->where('category_id',2)->get();
        $products_three=Product::with('category')->where('category_id',3)->get();
        $products_four=Product::with('category')->where('category_id',4)->get();
        $products_five=Product::with('category')->where('category_id',5)->get();
        $products_six=Product::with('category')->where('category_id',6)->get();
        $products_seven=Product::with('category')->where('category_id',8)->get();
        $news=News::take(3)->latest()->get();
        $galleries = Gallery::where('product_id',0)->where('status',1)->paginate(6);
        $categoryBanner = CategoryBanner::first();
        $aboutUs = AboutUs::first();
        return view('frontend.home',compact('banners','teams','clients','videoGalleries','categories','certificates','products','news','galleries','products_two','products_three','products_four','products_five','categories_one','categories_two','categories_three','categories_four','categories_five','products_six','categoryBanner','categories_six','categories_seven','products_seven','aboutUs'));
    }
    public function gallery(){
        $galleries = Gallery::where('product_id',0)->where('status',1)->get();
        return view('frontend.gallery',compact('galleries'));
    }
    public function catalogue(){
        $catalogue = Catalogue::first();
        return view('frontend.catalogue',compact('catalogue'));
    }
    public function aboutUs(){
        $teams = Team::where('status',1)->get();
        $clients = Client::where('status',1)->get();
        $certificates = Certificate::where('status',1)->get();
        return view('frontend.about_us',compact('teams','clients','certificates'));
    }
    public function contactUs(){
        return view('frontend.contact_us');
    }
    public function categoryWiseProduct($categoryId){
        $categoryId = decrypt($categoryId);
        $category=Category::find($categoryId);
        $products=Product::with('category')->where('category_id',$categoryId)->get();
        return view('frontend.product',compact('category','products'));
    }
    public function productDetails($productId){

        $productId = decrypt($productId);
        $productGet = Product::find($productId);
        $productImage=ProductImage::where('product_id',$productId)->get();
        $product = Product::with('category')->find($productId);
        $productPdf = Product::find($productId);

        $relatedProduct = Product::with('category')
                        ->where('id','<>', $productId)
                        ->where('category_id', $productGet->category_id)
                        ->get();

        return view('frontend.product_details',compact('productImage','product','relatedProduct','productPdf'));
    }
    public function newsAndEvent(){
        $news=News::get();
        return view('frontend.news_and_event',compact('news'));
    }
    public function newsAndEventDetails($newsId){
        $newsId = decrypt($newsId);
        $newsAndEvent=News::find($newsId);
        $prevNews = News::where('id','<',$newsAndEvent->id)->orderBy('id','desc')->first();
        $nextNews = News::where('id','>',$newsAndEvent->id)->orderBy('id','asc')->first();
        return view('frontend.news_and_events_single',compact('newsAndEvent','prevNews','nextNews'));
    }
}
