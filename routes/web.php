<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CategoryBannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontHomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;

Route::get('/admin', function () {
    return redirect()->route('login');
});
//frontend route
Route::get('/', [FrontHomeController::class,'home'])->name('frontend_home');
Route::get('/gallery', [FrontHomeController::class,'gallery'])->name('frontend_gallery');
Route::get('/catalogue', [FrontHomeController::class,'catalogue'])->name('catalogue_font');
Route::get('/about-us', [FrontHomeController::class,'aboutUs'])->name('frontend_about_us');
Route::get('/contact-us', [FrontHomeController::class,'contactUs'])->name('frontend_contact_us');
Route::get('/news-event-event', [FrontHomeController::class,'newsAndEvent'])->name('frontend_news_and_event');
Route::get('/news-and-event/details/{newsId}', [FrontHomeController::class,'newsAndEventDetails'])->name('frontend_news_and_event_details');
Route::get('/product/category-wise/{categoryId}', [FrontHomeController::class,'categoryWiseProduct'])->name('frontend_product');
Route::get('/product/details/{productId}', [FrontHomeController::class,'productDetails'])->name('frontend_product_details');

// Message
Route::post('admin/message/add', [MessageController::class, 'addPost'])->name('message_add');


Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::get('user', [UserController::class, 'index'])->name('user.all');
    Route::get('user/add',  [UserController::class, 'add'])->name('user.add');
    Route::post('user/add',  [UserController::class, 'addPost']);
    Route::get('user/edit/{user}',  [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/edit/{user}',  [UserController::class, 'editPost']);


    //Administrator Area

    // Banner
    Route::get('admin/banner', [BannerController::class, 'index'])->name('banner');
    Route::get('admin/banner/add', [BannerController::class, 'add'])->name('banner_add');
    Route::post('admin/banner/add', [BannerController::class, 'addPost']);
    Route::get('admin/banner/edit/{banner}', [BannerController::class, 'edit'])->name('banner_edit');
    Route::post('admin/banner/edit/{banner}', [BannerController::class, 'editPost']);

    // Team
    Route::get('admin/team', [TeamController::class, 'index'])->name('team');
    Route::get('admin/team/add', [TeamController::class, 'add'])->name('team_add');
    Route::post('admin/team/add', [TeamController::class, 'addPost']);
    Route::get('admin/team/edit/{team}', [TeamController::class, 'edit'])->name('team_edit');
    Route::post('admin/team/edit/{team}', [TeamController::class, 'editPost']);

    // Gallery
    Route::get('admin/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('admin/gallery/add', [GalleryController::class, 'add'])->name('gallery_add');
    Route::post('admin/gallery/add', [GalleryController::class, 'addPost']);
    Route::get('admin/gallery/edit/{gallery}', [GalleryController::class, 'edit'])->name('gallery_edit');
    Route::post('admin/gallery/edit/{gallery}', [GalleryController::class, 'editPost']);

    // Video Gallery
    Route::get('admin/video-gallery', [VideoGalleryController::class, 'index'])->name('video_gallery');
    Route::get('admin/video-gallery/add', [VideoGalleryController::class, 'add'])->name('video_gallery_add');
    Route::post('admin/video-gallery/add', [VideoGalleryController::class, 'addPost']);
    Route::get('admin/video-gallery/edit/{videoGallery}', [VideoGalleryController::class, 'edit'])->name('video_gallery_edit');
    Route::post('admin/video-gallery/edit/{videoGallery}', [VideoGalleryController::class, 'editPost']);

    // Client
    Route::get('admin/client', [ClientController::class, 'index'])->name('client');
    Route::get('admin/client/add', [ClientController::class, 'add'])->name('client_add');
    Route::post('admin/client/add', [ClientController::class, 'addPost']);
    Route::get('admin/client/edit/{client}', [ClientController::class, 'edit'])->name('client_edit');
    Route::post('admin/client/edit/{client}', [ClientController::class, 'editPost']);

    // Catalogue
    Route::get('admin/catalogue/add', [CatalogueController::class, 'add'])->name('catalogue_add');
    Route::post('admin/catalogue/add', [CatalogueController::class, 'addPost']);
    // About Us
    Route::get('admin/about-us/add', [AboutUsController::class, 'add'])->name('about_us');
    Route::post('admin/about-us/add', [AboutUsController::class, 'addPost']);

    // Category Banner
    Route::get('admin/category/banner/add', [CategoryBannerController::class, 'add'])->name('category_banner_add');
    Route::post('admin/category/banner/add', [CategoryBannerController::class, 'addPost']);

    // Category
    Route::get('admin/category', [CategoryController::class, 'index'])->name('category');
    Route::get('admin/category/add', [CategoryController::class, 'add'])->name('category_add');
    Route::post('admin/category/add', [CategoryController::class, 'addPost']);
    Route::get('admin/category/edit/{category}', [CategoryController::class, 'edit'])->name('category_edit');
    Route::post('admin/category/edit/{category}', [CategoryController::class, 'editPost']);

     // Product
     Route::get('all-product', [ProductController::class, 'product'])->name('all_product');
     Route::get('all-product-datatable', [ProductController::class, 'productDatatable'])->name('product.datatable');
     Route::get('product/add', [ProductController::class, 'productAdd'])->name('product_add');
     Route::post('product/add', [ProductController::class, 'productAddPost']);
     Route::get('product/edit/{product}', [ProductController::class, 'productEdit'])->name('product.edit');
     Route::post('product/edit/{product}', [ProductController::class, 'productEditPost']);
     Route::post('product-image-upload', [ProductController::class, 'productImageUpload'])->name('product_image_upload');
     Route::post('product/delete', [ProductController::class,'deleteProduct'])->name('product.delete');

      // news Post
    Route::post('news_events_upload_image', [NewsController::class,'imageUploads'])->name('news_events_upload_image');
    Route::get('/news-and-events', [NewsController::class,'index'])->name('news');
    Route::get('/news-and-events/add', [NewsController::class,'add'])->name('news.add');
    Route::post('/news-and-events/add', [NewsController::class,'addPost']);
    Route::get('/news-and-events/edit/{news}', [NewsController::class,'edit'])->name('news.edit');
    Route::post('/news-and-events/edit/{news}', [NewsController::class,'editPost']);
    Route::post('/news-and-events/delete', [NewsController::class,'delete'])->name('news.delete');

    // Certificate
    Route::get('admin/certificate', [CertificateController::class, 'index'])->name('certificate');
    Route::get('admin/certificate/add', [CertificateController::class, 'add'])->name('certificate_add');
    Route::post('admin/certificate/add', [CertificateController::class, 'addPost']);
    Route::get('admin/certificate/edit/{certificate}', [CertificateController::class, 'edit'])->name('certificate_edit');
    Route::post('admin/certificate/edit/{certificate}', [CertificateController::class, 'editPost']);

//Message
Route::get('admin/message', [MessageController::class, 'index'])->name('message');


});



require __DIR__ . '/auth.php';
