<?php

namespace App\Http\Controllers;

use App\Helpers\UploadHelper;
use App\Models\AccountHead;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\InventoryLog;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductSubCategory;
use App\Models\ProjectImage;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Mockery\Exception;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller{
    public function product(){
        return view('purchase.product.all');
    }
    public function productAdd(){
        $categories = Category::where('status', 1)->orderBy('id', 'asc')->get();
        return view('purchase.product.add', compact('categories'));
    }
    public function productAddPost(Request $request){
        // dd($request->all());
        $rules = [
            'name' =>  [
                'required',
                Rule::unique('products')
                    ->where('name', $request->name)
            ],
            'category' => 'required',
            'price' => 'required',
            'product_capacity' => 'required',
            'image' => 'required',
            'quotation' => 'required|file|mimes:pdf', // 2MB max size
            'catalogue' => 'required|file|mimes:pdf', // 2MB max size
            'short_description' => 'nullable',
            'description' => 'nullable',
            'status' => 'required',
        ];

        $request->validate($rules);
        //        dd($request->all());

        $product = new Product();
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->product_capacity = $request->product_capacity;
        $product->youtube_link = $request->youtube_link;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->status = $request->status;

        if ($request->image){
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/product_image';
            $file->move($destinationPath, $filename);
            $path = 'uploads/product_image/' . $filename;
            $product->image = $path;

        }
        if ($request->quotation){
            $file = $request->file('quotation');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/product_file';
            $file->move($destinationPath, $filename);
            $quotation_path = 'uploads/product_file/' . $filename;
            $product->quotation = $quotation_path;
        }
        if ($request->catalogue){
            $file = $request->file('catalogue');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/product_file';
            $file->move($destinationPath, $filename);
            $catalogue_path = 'uploads/product_file/' . $filename;
            $product->catalogue = $catalogue_path;
        }
        $product->save();

        if ($request->imagesId) {
            for ($i = 0; $i < sizeof($request->imagesId); $i++) {
                $image = ProductImage::where('id', $request->imagesId[$i])->first();

                $filename = Uuid::uuid1()->toString();
                $ext = pathinfo($image->path, PATHINFO_EXTENSION);

                $thumbsSavePath = 'uploads/product_image/thumbs/' . $filename . '.' . $ext;

                // Thumbs Image
                $thumb = Image::make(public_path($image->path));
                $thumb->save(public_path($thumbsSavePath));

                $image->product_id = $product->id;
                $image->sort = $i + 1;
                $image->thumbs_image = $thumbsSavePath;
                $image->save();
            }
        }

        return redirect()->route('all_product')->with('message', 'Product Add Successfully.');
    }

    public function productDatatable(){
        $query = Product::query();
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function (Product $product) {
                $btn = '<a href="' . route('product.edit', ['product' => $product->id]) . '" class="btn btn-warning btn-sm btn-edit"><i class="fa fa-edit"></i></a>';
                $btn .= ' <a data-id="' . $product->id . '" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a> ';
                return $btn;
            })
            ->addColumn('quotation', function (Product $product) {
                $btn = '<a href="' . asset($product->catalogue). '" target="_blank" class="btn btn-warning btn-sm btn-edit">View</i></a>';
                return $btn;
            })
            ->addColumn('catalogue', function (Product $product) {
                $btn = '<a href="' . asset($product->catalogue). '" target="_blank" class="btn btn-warning btn-sm btn-edit">View</i></a>';
                return $btn;
            })
            ->addColumn('category', function (Product $product) {
                return $product->category->name ?? '';
            })
            ->addColumn('image', function (Product $product) {
                return '<img height="100" src="'.asset($product->image).'">';
            })
            ->addColumn('status', function (Product $product) {
                if ($product->status == 1)
                    return '<span class="badge badge-success">Active</span>';
                else
                    return '<span class="badge badge-danger">Inactive</span>';
            })
            ->rawColumns(['action','catalogue','quotation', 'status','image'])
            ->toJson();
    }

    public function productEdit(Product $product){
        $categories = Category::where('status', 1)->orderBy('id', 'asc')->get();
        $productImages = ProductImage::where('product_id',$product->id)->get();
        return view('purchase.product.edit', compact('product', 'categories'));
    }

    public function productEditPost(Product $product, Request $request){
        $rules = [
            'name' =>  [
                'nullable',
                Rule::unique('products')
                    ->ignore($product->id)
                    ->where('name', $request->name)
            ],
            'category' => 'nullable',
            'price' => 'nullable',
            'product_capacity' => 'nullable',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'status' => 'nullable',
        ];

        $request->validate($rules);

        if ($request->image){
            // Upload Image
            if (file_exists($product->image)){
                unlink($product->image);
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/product_image';
            $file->move($destinationPath, $filename);
            $path = 'uploads/product_image/' . $filename;
            $product->image = $path;

        }
        if ($request->quotation){
            // Upload quotation file
            if (file_exists($product->quotation)){
                unlink($product->quotation);
            }

            $file = $request->file('quotation');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/product_file';
            $file->move($destinationPath, $filename);
            $quotation_path = 'uploads/product_file/' . $filename;
            $product->quotation = $quotation_path;

        }
        if ($request->catalogue){
            // Upload catalogue file
            if (file_exists($product->catalogue)){
                unlink($product->catalogue);
            }

            $file = $request->file('catalogue');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/product_file';
            $file->move($destinationPath, $filename);
            $catalogue_path = 'uploads/product_file/' . $filename;
            $product->catalogue = $catalogue_path;

        }

        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->product_capacity = $request->product_capacity;
        $product->youtube_link = $request->youtube_link;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->save();


        if ($request->imagesId) {
            for ($i = 0; $i < sizeof($request->imagesId); $i++) {
                $image = ProductImage::where('id', $request->imagesId[$i])->first();

                if ($image->product_id == null || $image->thumbs_image == null) {

                    $filename = Uuid::uuid1()->toString();
                    $ext = pathinfo($image->path, PATHINFO_EXTENSION);

                    $thumbsSavePath = 'uploads/product_image/thumbs/' . $filename . '.' . $ext;

                    // Thumbs Image
                    $thumb = Image::make(public_path($image->path));
                    $thumb->save(public_path($thumbsSavePath));
                    $image->thumbs_image = $thumbsSavePath;
                }

                $image->product_id = $product->id;
                $image->sort = $i + 1;
                $image->save();
            }

            // Delete Images
            $images = ProductImage::where('product_id', $product->id)
                ->whereNotIn('id', $request->imagesId)
                ->get();

            foreach ($images as $image) {
                if (file_exists($image->path))
                    unlink(public_path($image->path));

                if (file_exists($image->path))
                    unlink(public_path($image->thumbs));

                $image->delete();
            }
        }

        return redirect()->route('all_product')->with('message', 'Product Edit Successfully.');
    }
    public function productImageUpload(Request $request){
        try {
            $request->validate([
                'file' => 'required|image'
            ]);

            $file = $request->file('file');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/product_image/thumbs';
            $file->move($destinationPath, $filename);
            $path = 'uploads/product_image/thumbs/' . $filename;

            $image = ProductImage::create([
                'path' => $path,
                'big_image' => $path,
                'thumbs_image' => $path,
            ]);
            $image->fullPath = asset($path);

            return response()->json(['success' => true, 'data' => $image->toArray()]);
        }catch (Exception $exception){
            return response()->json(['success' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function deleteProduct(Request $request){
        $product = Product::where('id',$request->id)->first();
        if (file_exists($product->image)){
            unlink($product->image);
        }
        $product->delete();
        return response()->json(['success' => true, 'message' => 'Successfully Deleted.']);
    }
}
