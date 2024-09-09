@extends('layouts.master')
@section('title', 'Product Details')
@section('style')
    <style>
        .pdf {
                width: 100%;
                height: 120px;
                aspect-ratio: 4 / 3;
            }
            .pdf,
            html,
            body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            .text-color{
                /* color: rgb(27, 162, 185) !important; */
                font-weight: bold !important;
            }
            .video_size{
                width: 800px !important;
                height: 600px !important;
            }
    </style>
@endsection

@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="{{ asset('themes/frontend/images/parallax/14.jpg') }}">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="page-title">
                {{-- <h1 class="text-uppercase text-medium fs-1">{{ $category->name ?? '' }}</h1> --}}
            </div>
        </div>
    </section>
    <section id="product-page" class="product-page p-b-0">
        <div class="container">
            <div class="product">
                <div class="row m-b-40">
                    <div class="col-lg-6">
                        <div class="product-image">
                            <!-- Carousel slider -->
                            <div class="carousel dots-inside dots-dark arrows-visible" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="2500" data-lightbox="gallery">
                                @foreach($productImage as $image)
                                <a href="{{ asset($image->big_image ?? '') }}" style="width: 100% !important;height:600px !important;" data-lightbox="image" title="Shop product image!"><img alt="Shop product image!" src="{{asset($image->big_image)}}">
                                </a>
                                @endforeach
                                <iframe width="560" height="315" src="{{$product->youtube_link ?? ''}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                            <!-- Carousel slider -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-description">
                            <div class="product-category text-color" style="font-size: 20px !important;">{{$product->category->name ?? ''}}</div>
                            <div class="product-title">
                                <h3><a href="#">{{$product->name ?? ''}}</a></h3>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>Product Details</h4>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <ins style="font-size: 15px;">Price:৳{{$product->price ?? 0}}</ins><br>
                                    <ins style="font-size: 15px;">Capacity:{{$product->product_capacity ?? 0}}</ins>
                                </div>
                            </div>
                            <div class="seperator m-b-10"></div>
                                <p>{!!$product->description ?? ''!!}</p>
                            <div class="seperator m-t-20 m-b-10"></div>
                        </div>
                        <div class="row">
                        <div class="col-md-5">
                            <a href="{{route('frontend_contact_us')}}" class="btn btn-primary">Contact Supplier</a>
                        </div>
                        <div class="col-md-5">
                            <a href="tel:01324448300" class="btn btn-primary">Contact Us 01324448300</a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="row m-b-40">
                    <!-- Second Design-->
                    <div class="content col-lg-12">
                        <h5 class="mb-4"><i class="icon-arrow-right"> </i>Related Products</a></h5>
                        <div class="carousel mt-2" data-items="4" data-lightbox="gallery">
                            <!-- portfolio item -->
                            @foreach($relatedProduct as $product)
                            <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                                <div class="portfolio-item-wrap">
                                    <div class="portfolio-image">
                                        <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}"><img src="{{ asset($product->image) }}" alt="" style="height: 185px;"></a>
                                    </div>
                                </div>
                                <div class="bg_color">
                                    <h2><a class="text-dark" href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 32) ?? ''}}...</a></h2>
                                    <p class="text-dark">Price:৳{{ $product->price ?? 0 }}</p>
                                    <p class="text-dark"> Capacity: {{ $product->product_capacity ?? 0 }}</p>
                                    <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link text-white">Read More <i class="icon-arrow-right"> </i></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--end: Post Carousel -->
                </div>

                <div class="tabs tabs-folder">
                    <ul class="nav nav-tabs" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home3"
                                role="tab" aria-controls="home" aria-selected="false">
                                <i class="fa fa-align-justify"></i>Quotation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile3" role="tab"
                                aria-controls="profile" aria-selected="true"><i class="fa fa-align-justify"></i>Catalogue</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent3">
                        <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab">
                            <iframe src="{{ asset($productPdf->quotation ?? '') }}" width="50%" height="1000"></iframe>
                        </div>
                        <div class="tab-pane fade " id="profile3" role="tabpanel" aria-labelledby="profile-tab">
                            <iframe src="{{ asset($productPdf->catalogue ?? '') }}" width="50%" height="1000"></iframe>
                        </div>
                    </div>
                </div>
            </div>
              <!-- Product additional tabs -->

        </div>
    </section>
@endsection
