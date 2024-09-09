@extends('layouts.master')
@section('title', 'Product')
@section('style')
    <style>
        .bg-color,p{
                background-color: #2178D8;
                color: white;
            }
            .line-spance{
                line-height: 0px !important;
                margin-top: -14px !important;
            }
            .margin_top{
                margin-top: -23px !important;
            }
    </style>
@endsection

@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="{{ asset('themes/frontend/images/parallax/14.jpg') }}">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-uppercase text-medium">{{ $category->name ?? '' }}</h1>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h1 style="color: #2250fc;">Product List</h1>
            </div>
        </div>
    </section>

    <section id="page-content" class="sidebar-right">
        <div class="container">
            <!-- Blog -->
            <div id="blog" class="grid-layout post-4-columns m-b-30" data-item="post-item" data-stagger="10">
                <!-- Post item-->
                @foreach($products as $product)
                <div class="post-item border">
                    <div class="post-item-wrap" style="height: 355px !important;">
                        <div class="post-image">
                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}">
                                <img alt="" src="{{ asset($product->image) }}" class="card-img-top" alt="image" style="height:173px;width:266px">
                            </a>
                        </div>
                        <div class="post-item-description bg-color">
                            <h2><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="text-white" style="font-size: 14px !important;">{{substr($product->name, 0, 28) ?? ''}}..
                                </a></h2>
                            <p class="text-white margin_top">৳{{$product->price ?? ''}}</p><br>
                            <p class="text-white line-spance">{{$product->product_capacity ?? 0}}</p><br>
                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link text-white">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- end: post content -->
    </section> <!-- end: Content -->

    {{-- <section>
        <div class="container">



            <!--Product list-->
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem; height: 23rem;border: 3px solid blue; border-radius:3%;">
                        <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}">
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="Shop product image!">
                        </a>
                        <div class="card-body mt-3" style="background-color: #2178d8;">
                          <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}">
                            <p style="font-weight: bold" class="card-text text-white">{{$product->name ?? ''}}</p>
                            <p style="font-weight: bold" class="card-text text-white">৳{{ $product->price ?? 0 }}</p>
                          </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--End: Product list-->
        </div>
    </section> --}}

@endsection
