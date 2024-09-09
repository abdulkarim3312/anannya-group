@extends('layouts.master')
@section('title', 'Home')
@section('style')
    <style>

        .h1-title {
            color: #554499;
            text-shadow: 3px 1px 0 white;
        }
        .banner-content p {
            color: #fb605a;
            font-size: 24px !important;
        }

        /*start Division circle section*/
        .division-circle-area {
            height: 500px;
            border: 2px solid #5981b1;
            border-radius: 50%;
            width: 500px;
            margin: 0 auto;
            position: relative;
        }

        .division-circle-area {
            -webkit-animation:spin 30s linear infinite;
            -moz-animation:spin 30s linear infinite;
            animation:spin 30s linear infinite;
        }




        @-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
        @-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
        @keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }


        .eight-single-circle{
            -webkit-animation:spin2 30s linear infinite;
            -moz-animation:spin2 30s linear infinite;
            animation:spin2 30s linear infinite;
        }

        @-moz-keyframes spin2 { 100% { -moz-transform: rotate(-360deg); } }
        @-webkit-keyframes spin2 { 100% { -webkit-transform: rotate(-360deg); } }
        @keyframes spin2 { 100% { -webkit-transform: rotate(-360deg); transform:rotate(-360deg); } }


        @-moz-keyframes spin3 { 100% { -moz-transform: rotate(-360deg); } }
        @-webkit-keyframes spin3 { 100% { -webkit-transform: rotate(-360deg); } }
        @keyframes spin3 { 100% { -webkit-transform: rotate(-360deg); transform:rotate(-360deg); } }

        .circle-group{
            -webkit-animation:spin3 30s linear infinite;
            -moz-animation:spin3 30s linear infinite;
            animation:spin3 30s linear infinite;

        }


        .division-circle-area:hover, .division-circle-area:hover .circle-group,.division-circle-area:hover .eight-single-circle,.division-circle-area:hover .circle-group img:hover{
            -webkit-animation-play-state: paused;
            -moz-animation-play-state: paused;
            -o-animation-play-state: paused;
            animation-play-state: paused;
        }

        .circle-group {
            width: 150px;
            height: 150px;
            position: absolute;
            left: 36%;
            top: 36%;
            color: #fff;
        }
        .cr-group-table-cell {
            width: 100%;
            height: 100%;
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            font-size: 17px;
            font-weight: 800;
        }

        .cr-group-table {
            width: 100%;
            height: 100%;
            display: table;
        }

        .eight-single-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            text-align: center;
            color: #fff;
            border: 1px solid #296dc1;
            background: radial-gradient(circle at 50% 120%, #81e8f6, #76deef 10%, #055194 80%, #062745 100%);

        }

        .eight-single-circle.circle-shape-1 {
            position: absolute;
            top: -15%;
            left: 21%;
        }

        .eight-single-circle.circle-shape-2 {
            position: absolute;
            right: -12%;
            top: 9%;
        }
        .eight-single-circle.circle-shape-3 {
            position: absolute;
            left: -17%;
            top: 23%;

        }

        .eight-single-circle.circle-shape-4 {
            position: absolute;
            left: 5%;
            bottom: -12%;
        }
        .eight-single-circle.circle-shape-5 {
            position: absolute;
            right: -2%;
            top: 65%;
        }

        .eight-single-circle.circle-shape-6 {
            position: absolute;
            right: -1%;
            bottom: 3%;
        }
        .eight-single-circle.circle-shape-7 {
            position: absolute;
            left: 32%;
            bottom: -13%;
        }

        .eight-single-circle.circle-shape-8 {
            position: absolute;
            right: 20%;
            bottom: -5%;
        }
        .circle-shape-table {
            width: 100%;
            height: 100%;
            display: table;
        }

        .circle-shape-table-cell {
            width: 100%;
            height: 100%;
            vertical-align: middle;
            display: table-cell;
        }
        .circle-shape-table-cell a {
            color: #fff;
            font-size: 20px;
            width: 100%;
            display: block;
            height: 100%;
            line-height: 7;
        }




        /*end Division circle section*/

        .circle-group img {
            width: 150px;
            height: 124px;
            object-fit: contain;
        }

        .circle-group img {
            padding: 0 7px;
        }
        .circle-group {
            width: 150px;
            height: 123px;
        }
        .eight-single-circle{
            /*transition: all 0.5s ease;*/
            transition: width 0.5s, height 0.5s,top 0.5s,bottom 0.5s,left 0.5s,right 0.5s;

        }

        .eight-single-circle.circle-shape-1:hover {
            background: #554499;
            width: 190px;
            height: 190px;
            top: -15%;
            line-height: 10;
        }
        .eight-single-circle.circle-shape-2:hover {
            background: #554499;
            width: 190px;
            height: 190px;
            right: -12%;
            top: 9%;
            line-height: 10;
        }

        .eight-single-circle.circle-shape-7:hover{
            background: #554499;
            width: 190px;
            height: 190px;
            line-height: 10;
            left: 32%;
            bottom: -13%;

        }
        .eight-single-circle.circle-shape-3:hover {
            background: #554499;
            width: 190px;
            height: 190px;
            line-height: 10;
            left: -17%;
            top: 23%;
        }
        .eight-single-circle.circle-shape-4:hover {
            background: #554499;
            width: 190px;
            height: 190px;
            line-height: 10;
            left: 5%;
            bottom: -12%;
        }
        .eight-single-circle.circle-shape-5:hover {
            background: #554499;
            width: 190px;
            height: 190px;
            line-height: 10;
            right: -2%;
            top: 65%;
        }
        .eight-single-circle.circle-shape-6:hover {
            background: #554499;
            width: 150px;
            height: 150px;
            line-height: 10;
            right: -1%;
            bottom: 3%;
        }
        .eight-single-circle.circle-shape-7:hover {
            background: #554499;
            width: 150px;
            height: 150px;
            line-height: 10;
        }

        .eight-single-circle.circle-shape-8:hover{
            background: #554499;
            width: 150px;
            height: 150px;
            line-height: 10;
            bottom: -9%;
            right: 18%;

        }
        .circle-shape-table-cell a:hover {
            line-height: 9;
            transition: line-height 0.5s;
        }

        .fill {
            opacity: 1;
        }
        .team-content h3 a{
            text-transform: uppercase;
            margin-bottom: 0;
            color: #fff;
            font-size: 15px;
        }
        .fill {
            background-size: cover;
        }
        .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right, .carousel-control .fa-angle-double-right, .carousel-control .fa-angle-double-left{
            position: absolute;
            top: 50%;
            z-index: 5;
            display: inline-block;
            margin-top: -10px;
        }
        .slider-arrow {
            font-size: 70px;
            color: #296dc1;
        }
        .circle-group {
            border-radius: 50%;
            height: 150px;
            width: 150px;


        }
        .circle-group:before {
            content: "";
            position: absolute;
            top: 1%;
            left: 5%;
            width: 90%;
            height: 90%;
            border-radius: 50%;

            z-index: 2;
        }
        .eight-single-circle {
            width: 120px;
            height: 120px;
            background: #296dc1;
            border-radius: 50%;
            text-align: center;
            color: #fff;
            border: 1px solid #296dc1;

        }
        .eight-single-circle:before {
            content: "";
            position: absolute;
            top: 1%;
            left: 5%;
            width: 90%;
            height: 90%;
            border-radius: 50%;
            background: radial-gradient(circle at 50% 0px, #ffffff, rgba(255, 255, 255, 0) 58%);
            -webkit-filter: blur(5px);
            z-index: 2;
        }
        .circle-group img {
            padding: 22px;
            margin: 12px -1px;
        }
        .fill {
            background-size: 100% 100%;
        }
        .circle-group {
            background: #ddd;
            border: 2px solid #7062a9;
        }
        .eight-single-circle {
            background: #554499;
            color: #fb605a;
            border: 1px solid #554499;
        }
        .eight-single-circle.circle-shape-3:hover {
            background: #544398;
        }
        .division-circle-area {
            height: 430px;
            width: 430px;
            border: 2px solid #fb605a;
        }
        .eight-single-circle {
            width: 170px;
            height: 170px;
        }

        .circle-shape-table-cell a {
            color: #fff;
            line-height: 6;
        }
        .circle-group {
            width: 130px;
            height: 130px;
            position: absolute;
            left: 35%;
            top: 30%;
        }
        .circle-group {
            left: 35%;
            top: 36%;
        }
        .circle-group img {
            margin: 3px -1px;
        }
        .circle-shape-table-cell a {
            color: #fff;
            line-height: 20px;
            font-size: 16px;
            margin-top: 120px;
        }

        .main-portfolio {
            padding-top: 17px;
        }

        .portfolio-box {
            margin: 0 5px;
        }
        .main-portfolio {
            padding-top: 40px;
        }

        .main-portfolio {
            padding-bottom: 40px;
        }
        .portfolio-box1 {
            margin: 0 5px;
            background: #fb605a;
            padding: 8px 8px;
            height: 100%;
           margin-top: 5px;
           margin-bottom: 5px;
            border-radius: 15px;
            text-align: center;

        }

        .box-details {
            padding: 0 10px;
            text-align: center;
            padding-bottom: 35px;
        }
        .box-icon {
            width: 164px;
            height: 164px;
            border: 15px solid #fff;
            border-radius: 50%;
            margin: 0 auto;
            display: block;
            background: #79b800;
            position: relative;
        }
        h1.box-title {
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff;
            margin-bottom: 5px;
            letter-spacing: 3px;
            position: absolute;
            text-align: center;
            display: table;
            margin: 0 auto;
            width: 100%;
            top: calc(50% - 14px);
        }
        .box-details.boxes-id2 .box-icon {
            background: #0075af;
        }
        .boxes-id3 .box-icon {
            background: #f47920;
        }
        #vision_area{
            padding: 0px;
            position: relative;
            z-index: 99;
            margin-top: -55px;
            background: transparent;
        }
        @media screen and (max-width: 550px) {
            .m-response{
                margin-top: 50px !important;
                transform: scale(0.6) !important;
                margin-left: -12% !important;
            }
        }
        @media screen and (max-width: 1024px) {
            .inspiro-slider{
                margin-bottom: -380px !important;
            }
        }
        @media screen and (max-width: 767px) {
            .font_size{
                font-size: 15px !important;
            }
        }
        @media screen and (min-width: 992px) {
            .font_size{
                font-size: 25px !important;
                height: 34px !important;
            }
        }
        /* @media screen and (min-width: 420px) {
            .font_size{
                font-size: 12px !important;
            }

        } */
        @media screen and (max-width: 992px) {
            .dItem{
                height: 34px !important;
            }
        }

        .parallax{
            width: 100%;
            pointer-events: none;
            background-attachment: fixed;
            background-color: rgba(0, 0, 0, 0);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 50% 0px;
            padding: 300px 0px;
        }
        .inline-image {
            display: inline-block;
            max-width: 100px; /* Adjust the size as necessary */
        }

        .img_height{
            height: 255px !important;
        }
        #slider .image_overlay {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            content: ' ';
            z-index: 0;
            background: rgba(0,0,0,0.59);
            opacity: .2
        }

        #slider .kenburns-bg.kenburns-bg-animate {

        }


        .mob_log_section .container
        {
            min-width: 100%;
        }

        .dItem {
            width: 100%;
        }

        .dItem span {
            font-size: 25px;
            color: red;
            font-size: 30px;
            border: 2px solid red;
            padding: 10px;
            border-radius: 10px;
            font-size: 20px !important;
            color: #000 !important;
            margin-bottom: 50px;
            font-weight: bold;
            padding-bottom: 30px;
        }

        .team-members .team-member .team-desc > span {
            font-size: 13px;
            color: #bbb;
            line-height: 18px;
            width: 100%;
            display: block;
            margin: 10px 0;
        }




        @media only screen and (max-width: 1000px) {
            .videoSection .container {
                min-width: 100%;
            }

            .team-image img {
                width: auto !important;
                object-fit: cover;
            }

            .footer-content .container {
                min-width: 100%;
            }
        }

        @media only screen and (max-width: 500px) {
            .mobile_logo {
                margin: 50px 0;
            }
           .mobile_logo img {
                width: calc(50% - 50px);
                object-fit: cover;
                margin: 20px;
           }

            .dItem span {
                padding-bottom: 10px;
            }
        }




    </style>
@section('content')
    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-height-xs="360">
        <!-- Slide 1 -->
        @foreach($banners as $index => $banner)
        <div class="slide kenburns" style="background-image:url({{ asset($banner->image) }});">
            <div class="bg-overlay image_overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <span style="font-size:30px;!important;" class="strong">{{ $banner->title ?? '' }}</span>
                    <h3 class="text-dark">{{ $banner->short_description ?? '' }}</h3>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        @endforeach
        <!-- end: Slide 1 -->
    </div>

    <section class="p-b-10 p-t-10 mob_log_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center ">
                    <h1 class="firsttitle" style="color: #6087c9;">ANANNYA GROUP</h1>
                    <h1 class="firsttitle" style="color: #1184e2;">The Company</h1>
                    <h2 class="secondtitle" style="color:#055194">Anannya International Treads Marketing</h2>
                    <h3 class="secondtitle" style="color:#059445">Anannya world fashion (Luxurious Brand)</h3>
                    <h3 class="secondtitle" style="color:#597708">Chanina bazar 71 (Online supershop)</h3>
                    <h3 class="secondtitle" style="color:#e728ce">Linyi Frieda International Trading Co. LTD (China)</h3>
                    <h3 class="secondtitle" style="color:#13b4a7">Shifat Engineering Workshop</h3>
                    <h3 class="secondtitle" style="color:#6e2beb">Green Bangladesh</h3>
                    <h3 class="thirttitle">An Organization Of <span style="color: #6087c9">Anannya Group</span></h3>
                    <div class="contactsection">
                        <div>
                            <a class="btn" href="{{route('frontend_contact_us')}}">&nbsp;CONTACT US&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        <div class="dItem">
                            <span class="mt-2 font_size">+880 1324-448350 /1324-448333</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center mobile_logo">
                    <img src="{{ asset('themes/frontend/images/four.png') }}" alt="" class="img-fluid d-inline-block">
                    <img src="{{ asset('themes/frontend/images/homecontrol.jpg') }}" alt="" class="img-fluid d-inline-block">
                    <img src="{{ asset('themes/frontend/images/second.jpg') }}" alt="" class="img-fluid d-inline-block">
                    <img src="{{ asset('themes/frontend/images/third.jpg') }}" width="200" alt="" class="img-fluid d-inline-block">
                    <img src="{{ asset('themes/frontend/images/five.jpg') }}" alt="" class="img-fluid d-inline-block">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="Title" style="color: #6087c9;">WELCOME TO, <br>ANANNYA GROUP</h3>
                    <h4 class="aboutCaption" style="color: #6087c9;">We Believe In Quality Of Hardwork.</h4>
                    <p class="aboutCT text-dark">Our Main Products is Manufacturer Eco Friendly Bricks Tiles, Ecological Board,
                        Roof Tiles, Door &amp; Garments etc.</p>
                    <p class="aboutT text-dark">Anannya Group is Located in Dhaka Bangladesh. The Company Start 2003. Now this
                        enterprise Sister Concern 3 Manufacturers Company and 2 Trading Business Center 2 Business
                        Support Help Center. <br>
                        1) Habib &amp; Sun Trading Co, Ltd. (Eco- Friendly Bricks &amp; Tiles ) Manufacturer. <br>
                        2) Sefat Eco – Friend Brick &amp; Tiles Industries. Manufacturer. <br>
                        3) Anannya Woman’s Fashion World. ( Garments Dress ) <br>
                        4) Anannya International Trading. ( Eco – Bricks &amp; Tiles Project Machinery ) Importer &amp; Agent In
                        Bangladesh. <br>
                        5) Anannya International Trade &amp; Marketing. (Chinabzr71 Online Supper shop , Garments,
                        Electronics, Lather, Shoes, etc Product Importer &amp; Marketing Company. <br>
                        6) Sefat Agro &amp; Animal Product Farm’s. <br>
                        7) Managing Director of the Weekly Panchabarta. <br>
                        8) Village Home Development Engineering &amp; Eco –Friend Project Consultancy Farm.</p>
                    <div class="mt-2">
                        <a class="btn" href="{{route('frontend_contact_us')}}">&nbsp;MORE INFO&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="aboutBgImage">
                                <img width="100%" src="{{ asset('themes/frontend/images/about1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6"> <img width="100%" src="{{ asset('themes/frontend/images/about2.jpg') }}" alt=""></div>
                        <div class="col-md-6"> <img width="100%" src="{{ asset('themes/frontend/images/about3.jpg') }}" alt=""></div>
                    </div>
                </div>
            </div> <!-- // row end -->
        </div>
    </section>
    <section class="p-b-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-5">
                    <div data-animate="fadeInUp" data-animate-delay="0">
                        <img src="{{ asset($aboutUs->image ?? '') }}" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="heading-text heading-section">
                        <h2 style="color: #2250fc">THE COMPANY</h2>
                        <span class="lead text-dark">{{ $aboutUs->description ?? '' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="margin-top: -44px !important;">
        <div class="container">
            <div class="col-md-12 text-left pt-3 color-black">
                <h3 class="Title" style="color: #2250fc">EXPERIENCE OF 23 YEARS</h3>
            </div>
            <div class="col-md-12 text-left pb-3 mb-3">
                <span style="color: #2250fc;font-size:30px"><b>Our Journey</b></span>

            </div>
            <div class="row">

                <div class="col-md-12">
                    <p class="EXPERIENCEp text-dark">Anannya Group is Located in Dhaka Bangladesh. The Company Start 2003. Now this enterprise Sister Concern 3 Manufacturers Company and 2 Trading Business Center 2 Business Support Help Center.</p>
                </div>

                <div class="col-md-12 text-dark"><br>
                    <ul>
                        <li class="list"><b>1.</b>&nbsp;Anannya World Fashion (Luxurious Express).</li>
                        <li class="list"><b>2.</b>&nbsp;Sefat Eco–Friendly Brick & Tiles Industries.</li>
                        <li class="list"><b>3.</b>&nbsp;Anannya Woman’s Fashion World. ( Garments Dress ).                        </li>
                        <li class="list"><b>4.</b>&nbsp;Sefat Engineering Workshop.</li>
                        <li class="list"><b>5.</b>&nbsp;Anannya International Trade & Marketing</li>
                        <li class="list"><b>6.</b>&nbsp;Chinabzr71 Online Supper shop, Garments, Electronics, Lather, Shoes, etc. Product Importer & Marketing Company(Online Super Shop) </li>
                        <li class="list"><b>7.</b>&nbsp;Sefat Agro & Animal Product Farm.</li>
                        <li class="list"><b>8.</b>&nbsp;Managing Director of the Weekly Panchabarta.</li>
                        <li class="list"><b>9.</b>&nbsp;Village Home Development Engineering & Eco –Friend Project Consoltancy Farm.</li>
                        <li class="list"><b>10.</b>&nbsp;Green Bangladesh.</li>
                    </ul>
                </div>
            </div><!-- row -->

        </div>
        <div  style="background-image: url('{{ asset('themes/frontend/images/7.jpg') }}');" class="mt-30 call-to-action p-t-50 p-b-50 background-image mb-0">
            <div class="container">
              <div class="row">
                <div class="col-lg-10">
                  <h3 class="text-light">
                    WE ARE ALWAYS AVAILABLE 24/7
                  </h3>
                  <p class="text-light">
                    আপনি কি সাক্ষাৎ করে বিস্তারিত জনাতে চান?
                  </p>
                </div>
                <div class="col-lg-2">
                  <a href="{{route('frontend_contact_us')}}" class="btn btn-light btn-outline">যোগাযোগ করুন!</a>
                </div>
              </div>
            </div>
        </div>
    </section>

    <!-- Our Product Concern -->
    <section id="page-title" style="margin-top: -79px;">
        <div class="container">
            <div class="page-title">
                <h2> <span style="color: #2250fc;">Our Product</span></h2>
            </div>
        </div>
    </section>

    <section id="page-content">
        <div class="container">
            <div class="row">
                <div class="content col-lg-12">
                   <div>
                        <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_one->id)) }}">{{ $categories_one->name ?? '' }}</a></h5>
                        <div class="row">
                            <img src="{{ isset($categories_one->banner_image) ? asset($categories_one->banner_image) : null }}" alt="">
                        </div>
                        <div class="carousel mt-2" data-items="4" data-lightbox="gallery">
                            <!-- portfolio item -->
                            @foreach($products as $product)
                            <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                                <div class="portfolio-item-wrap">
                                    <div class="portfolio-image">
                                        <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}"><img src="{{ asset($product->image) }}" alt="" style="height: 185px;width:255px;"></a>
                                    </div>

                                </div>
                                <div style="">
                                    <h2><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 32) ?? ''}}...</a></h2>
                                    <p class="text-dark">Price:৳{{ $product->price ?? 0 }}</p>
                                    <p class="text-dark"> Capacity: {{ $product->product_capacity ?? 0 }}</p>
                                    <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link text-dark">Read More <i class="icon-chevron-right"></i></a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="line"></div>

                        <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_two->id)) }}">{{ $categories_two->name ?? '' }}</a></h5>
                        <div class="row">
                            <img src="{{ isset($categories_two->banner_image) ? asset($categories_two->banner_image) : null }}" alt="">
                        </div>
                        <div class="carousel mt-2" data-items="4" data-lightbox="gallery">

                        @foreach($products_two as $product)
                        <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}"><img src="{{ asset($product->image) }}" alt="" style="height: 185px;width:255px;"></a>
                                </div>
                            </div>
                            <h2><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 32) ?? ''}}...</a></h2>
                            <p>Price:৳{{ $product->price ?? 0 }}</p>
                            <p> Capacity: {{ $product->product_capacity ?? 0 }}</p>
                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                        @endforeach
                    </div>
                    <div class="line"></div>
                    <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_three->id)) }}">{{ $categories_three->name ?? '' }}</a></h5>
                    <div class="row">
                        <img src="{{ isset($categories_three->banner_image) ? asset($categories_three->banner_image) : null }}" alt="">
                    </div>
                    <div class="carousel mt-2" data-items="4" data-lightbox="gallery">

                        @foreach($products_three as $product)
                        <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}"><img src="{{ asset($product->image) }}" alt="" style="height: 185px;width:255px;"></a>
                                </div>
                            </div>
                            <h2><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 32) ?? ''}}...</a></h2>
                            <p>Price:৳{{ $product->price ?? 0 }}</p>
                            <p> Capacity: {{ $product->product_capacity ?? 0 }}</p>
                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                        @endforeach
                    </div>
                    <div class="line"></div>
                    <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_four->id)) }}">{{ $categories_four->name ?? '' }}</a></h5>
                    <div class="row">
                        <img src="{{ isset($categories_four->banner_image) ? asset($categories_four->banner_image) : null }}" alt="">
                    </div>
                    <div class="carousel mt-2" data-items="4" data-lightbox="gallery">

                        @foreach($products_four as $product)
                        <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}"><img src="{{ asset($product->image) }}" alt="" style="height: 185px;width:255px;"></a>
                                </div>
                            </div>
                            <h2><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 32) ?? ''}}...</a></h2>
                            <p>Price:৳{{ $product->price ?? 0 }}</p>
                            <p> Capacity: {{ $product->product_capacity ?? 0 }}</p>
                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                        @endforeach
                    </div>
                    <div class="line"></div>
                    <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_five->id)) }}">{{ $categories_five->name ?? '' }}</a></h5>
                    <div class="row">
                        <img src="{{ isset($categories_five->banner_image) ? asset($categoryBanner->banner_image) : null }}" alt="">
                    </div>
                    <div class="carousel mt-2" data-items="4" data-lightbox="gallery">
                        <!-- portfolio item -->
                        @foreach($products_five as $product)
                        <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}"><img src="{{ asset($product->image) }}" alt="" style="height: 185px; width:255px;"></a>
                                </div>
                            </div>
                            <h2><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 32) ?? ''}}...</a></h2>
                            <p>Price:৳{{ $product->price ?? 0 }}</p>
                            <p> Capacity: {{ $product->product_capacity ?? 0 }}</p>
                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                        @endforeach
                    </div>
                    <div class="line"></div>
                    <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_six->id)) }}">{{ $categories_six->name ?? '' }}</a></h5>
                    <div class="row">
                        <img src="{{ isset($categories_six->banner_image) ? asset($categories_six->banner_image) : null }}" alt="">
                    </div>
                    <div class="carousel mt-1" data-items="4" data-lightbox="gallery">
                        <!-- portfolio item -->
                        @foreach($products_six as $product)
                        <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}"><img src="{{ asset($product->image) }}" alt="" style="height: 185px;width:255px;"></a>
                                </div>
                            </div>
                            <h2><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 32) ?? ''}}...</a></h2>
                            <p>Price:৳{{ $product->price ?? 0 }}</p>
                            <p>Capacity: {{ $product->product_capacity ?? 0 }}</p>
                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                        @endforeach
                    </div>
                   </div>
                    <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_seven->id)) }}">{{ $categories_seven->name ?? '' }}</a></h5>
                    <div class="row">
                        <img src="{{ isset($categories_seven->banner_image) ? asset($categories_seven->banner_image) : null }}" alt="">
                    </div>
                    <div class="carousel mt-1" data-items="4" data-lightbox="gallery">
                        <!-- portfolio item -->
                        @foreach($products_seven as $product)
                        <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}"><img src="{{ asset($product->image) }}" alt="" style="height: 185px;width:255px;"></a>
                                </div>
                            </div>
                            <h2><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 32) ?? ''}}...</a></h2>
                            <p>Price:৳{{ $product->price ?? 0 }}</p>
                            <p>Capacity: {{ $product->product_capacity ?? 0 }}</p>
                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                        @endforeach
                    </div>
                   </div>

                    <!-- Second Design-->
                    {{-- <div>
                        <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_one->id)) }}">{{ $categories_one->name ?? '' }}</a></h5>
                        <div class="row">
                            <img src="{{ isset($categoryBanner->category_banner_image_one) ? asset('uploads/category_banner_image/'.$categoryBanner->category_banner_image_one) : null }}" alt="">
                        </div>
                        <div class="carousel mt-3" data-items="4">
                            <!-- Post item-->
                            @foreach($products as $product)
                                <div class="post-item border">
                                    <div class="post-item-wrap" style="height: 400px !important;">
                                        <div class="post-image">
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}">
                                                <img alt="" src="{{ asset($product->image) }}" style="height: 185px;"></a>
                                            <span class="post-meta-category"><a href="#"></a></span>
                                        </div>
                                        <hr>
                                        <div class="post-item-description">
                                            <h3><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 28) ?? ''}}...</a></h3>
                                            <p>Price: ৳{{ $product->price ?? 0 }}</p><br>
                                            <p>{{ $product->product_capacity ?? 0 }}</p><br>
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_two->id)) }}">{{ $categories_two->name ?? '' }}</a></h5>
                        <div class="row">
                            <img src="{{ isset($categoryBanner->category_banner_image_two) ? asset('uploads/category_banner_image/'.$categoryBanner->category_banner_image_two) : null }}" alt="">
                        </div>
                        <div class="carousel mt-3" data-items="4">
                            <!-- Post item-->
                            @foreach($products_two as $product)
                                <div class="post-item border">
                                    <div class="post-item-wrap" style="height: 400px !important;">
                                        <div class="post-image">
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}">
                                                <img alt="" src="{{ asset($product->image) }}" style="height: 185px;"></a>
                                            <span class="post-meta-category"><a href="#"></a></span>
                                        </div>
                                        <hr>
                                        <div class="post-item-description">
                                            <h3><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 28) ?? ''}}...</a></h3>
                                            <p>৳{{ $product->price ?? 0 }}</p>
                                            <p>{{ $product->product_capacity ?? 0 }}</p><br>
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_three->id)) }}">{{ $categories_three->name ?? '' }}</a></h5>
                        <div class="row">
                            <img src="{{ isset($categoryBanner->category_banner_image_three) ? asset('uploads/category_banner_image/'.$categoryBanner->category_banner_image_three) : null }}" alt="">
                        </div>
                        <div class="carousel mt-3" data-items="4">
                            <!-- Post item-->
                            @foreach($products_three as $product)
                                <div class="post-item border">
                                    <div class="post-item-wrap" style="height: 400px !important;">
                                        <div class="post-image">
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}">
                                                <img alt="" src="{{ asset($product->image) }}" style="height: 185px;"></a>
                                            <span class="post-meta-category"><a href="#"></a></span>
                                        </div>
                                        <hr>
                                        <div class="post-item-description">
                                            <h3><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 28) ?? ''}}...</a></h3>
                                            <p>৳{{ $product->price ?? 0 }}</p>
                                            <p>{{ $product->product_capacity ?? 0 }}</p><br>
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_four->id)) }}">{{ $categories_four->name ?? '' }}</a></h5>
                        <div class="row">
                            <img src="{{ isset($categoryBanner->category_banner_image_four) ? asset('uploads/category_banner_image/'.$categoryBanner->category_banner_image_four) : null }}" alt="">
                        </div>
                        <div class="carousel mt-3" data-items="4">
                            <!-- Post item-->
                            @foreach($products_four as $product)
                                <div class="post-item border">
                                    <div class="post-item-wrap" style="height: 400px !important;">
                                        <div class="post-image">
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}">
                                                <img alt="" src="{{ asset($product->image) }}" style="height: 185px;"></a>
                                            <span class="post-meta-category"><a href="#"></a></span>
                                        </div>
                                        <hr>
                                        <div class="post-item-description">
                                            <h3><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 28) ?? ''}}...</a></h3>
                                            <p>৳{{ $product->price ?? 0 }}</p>
                                            <p>{{ $product->product_capacity ?? 0 }}</p><br>
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_five->id)) }}">{{ $categories_five->name ?? '' }}</a></h5>
                        <div class="row">
                            <img src="{{ isset($categoryBanner->category_banner_image_five) ? asset('uploads/category_banner_image/'.$categoryBanner->category_banner_image_five) : null }}" alt="">
                        </div>
                        <div class="carousel mt-3" data-items="4">
                            <!-- Post item-->
                            @foreach($products_five as $product)
                                <div class="post-item border">
                                    <div class="post-item-wrap" style="height: 400px !important;">
                                        <div class="post-image">
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}">
                                                <img alt="" src="{{ asset($product->image) }}" style="height: 185px;"></a>
                                            <span class="post-meta-category"><a href="#"></a></span>
                                        </div>
                                        <hr>
                                        <div class="post-item-description">
                                            <h3><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 28) ?? ''}}...</a></h3>
                                            <p>৳{{ $product->price ?? 0 }}</p>
                                            <p>{{ $product->product_capacity ?? 0 }}</p><br>
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h5 class="mb-4">Category: <a href="{{ route('frontend_product', encrypt($categories_six->id ?? '')) }}">{{ $categories_six->name ?? '' }}</a></h5>
                        <div class="row">
                            <img src="{{ isset($categoryBanner->category_banner_image_six) ? asset('uploads/category_banner_image/'.$categoryBanner->category_banner_image_six) : null }}" alt="">
                        </div>
                        <div class="carousel mt-3" data-items="4">
                            <!-- Post item-->
                            @foreach($products_six as $product)
                                <div class="post-item border">
                                    <div class="post-item-wrap" style="height: 400px !important;">
                                        <div class="post-image">
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}">
                                                <img alt="" src="{{ asset($product->image) }}" style="height: 185px;"></a>
                                            <span class="post-meta-category"><a href="#"></a></span>
                                        </div>
                                        <hr>
                                        <div class="post-item-description">
                                            <h3><a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" style="font-size: 15px;">{{substr($product->name, 0, 30) ?? ''}}...</a></h3>
                                            <p>৳{{ $product->price ?? 0 }}</p>
                                            <p>{{ $product->product_capacity ?? 0 }}</p><br>
                                            <a href="{{ route('frontend_product_details', ['productId' => encrypt($product->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}
                    <!--end: Post Carousel -->
                </div>
            </div>
        </div>
    </section>
    <!-- end: Our Product Concern -->

    <section id="page-title" style="margin-top: -70px;">
        <div class="container">
            <div class="page-title">
                <h2> <span style="color: #2250fc;">Our Project Area</span></h2>
            </div>
        </div>
    </section>
    <section style="padding-top: 0px !important;">
        <div class="container">
           <div class="row">
            <div class="col-md-12">
                <img style="width: 100%" src="{{ asset('themes/frontend/images/our_project_area.png') }}" alt="">
            </div>
           </div>
        </div>
    </section>
    <!-- SERVICES -->
    <section style="padding-top: 0px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3 style="color: #2250fc;">COMMON FAQ</h3>
                    <h5>Most Question Ask</h5>
                    <div class="accordion toggle fancy radius clean">
                        <div class="ac-item">
                            <h5 class="ac-title"><i class="fa fa-question-circle"></i>Describes the structure of ECO Bricks machine</h5>
                            <div style="display: none;" class="ac-content">Eco bricks machine made of Steel Structures in which the members are made of steel and are joined by welding, riveting, or bolting. Because of the high strength of steel.</div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title"><i class="fa fa-question-circle"></i>What will be the cost to set up a ECO Bricks machine?</h5>
                            <div style="display: none;" class="ac-content">Its start from 9 lakhs to 2 crore to set up a full eco bricks machine. And the productive capacity of a machine start from 3 thousand to 50 thousand bricks per day.</div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title"><i class="fa fa-question-circle"></i>What is ECO Bricks?</h5>
                            <div style="display: none;" class="ac-content">ECO Bricks is Cellular Lightweight Concrete (CLC) bricks produced using European and Chinese machinaries and formula.</div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title"><i class="fa fa-question-circle"></i>What type of metarials used in ECO Bricks?</h5>
                            <div style="display: none;" class="ac-content">There is organic and bio-degradable foam and then mixed with cement slurry to produce lightweight concrete bricks. </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title"><i class="fa fa-question-circle"></i>ইটের বিকল্প পরিবেশ বান্ধব ইট উৎপাদন মেশিনের বৈশিষ্ট কি ?</h5>
                            <div style="display: none;" class="ac-content">
                                <ul style="list-style-type: disc;" class="pl-3">
                                    <li>নিখুঁত সাইজ ও সঠিক ওজনের কনক্রিট ব্রিক্স খুব সহজে ৭ জন লোক দ্বারা অল্প জমিতে প্রকল্পটি করা যায়।</li>
                                    <li>মেশিনের গ্যারান্টি ওয়ারেন্টি নিশ্চয়তা, যন্ত্রাংশ প্রাপ্তি নিশ্চয়তা , সহজে মেইনটেনেন্স করা যায়।</li>
                                    <li>নিখুঁত সাইজ ও সঠিক ওজনের কনক্রিট ব্রিক্স খুব সহজে ৭ জন লোক দ্বারা অল্প জমিতে প্রকল্পটি করা যায়। মেশিনের গ্যারান্টি ওয়ারেন্টি নিশ্চয়তা, যন্ত্রাংশ প্রাপ্তি নিশ্চয়তা , সহজে মেইনটেনেন্স করা যায়। বাংলাদেশেরে স্থানীয় কাচামাল বালু, পাথরের ডাস্ট ও সিমেন্ট দ্বারা পরিক্ষিত ভাবে মেশিনের ডিজাইন ও মেশিনটি তৈরি করা হওয়ায় উৎপাদন ব্যায় কম হয়। এবং সহজে যে কোন জায়গায় এই প্রকল্পটি করা যায়।</li>
                                    <li>প্রকল্পটি করার জন্য সর্ব নিম্ন ৯ লক্ষ টাকা হতে ২ কোটি টাকা পর্যন্ত (চট্রগ্রাম পোর্ট পর্যন্ত) ভিন্ন মডেলের মেশিন দ্বারা প্রকল্পটি করা যায়।</li>
                                    <li>আমাদের মেশিনারিজ এর বাংলাদেশে এজেন্ট ও টেকনেশিয়ান থাকায় খুব সহজে সেবা গ্রহন করা যায়।</li>
                                    <li>সর্ব নিম্ন ২০ শতক হইতে ৫ বিঘা জমিতে প্রকল্পটি করা যায়।</li>
                                    <li>এই মেশিন দ্বারা বিভিন্ন ধরনের নির্মান সামগ্রী ও সলিড ব্রিক্স , হলো ব্লক, ঝিগঝাগ ব্রিক্স, ইউনি ব্লক, কার্ব স্টোন, রোড ডিভাইডার, প্যাভার তৈরি করা যায়।</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title"><i class="fa fa-question-circle"></i>ইটের বিকল্প পরিবেশ বান্ধব ইট উৎপাদনে ব্যয় কেমন ?</h5>
                            <div style="display: none;" class="ac-content">
                                <ul style="list-style-type: disc;" class="pl-3">
                                    <li>পরিবেশবান্ধব ইট সঠিক মাপ ও সাইজে উৎপাদন হওয়ায় , ভবন নির্মানে মাটির ইটের চেয়ে কম লাগায় ভবন নির্মান ব্যায় কম হয়।</li>
                                    <li>পরিবেশবান্ধব একই মাপ ও মজবুত হওয়ায়, এবং এর কোন আঁকাবাকা না থাকায় ভবন নির্মানে কোন প্লাস্টার লাগে না এবং গাথুনিতে সিমেন্ট কম লাগায় ভবন নির্মান ব্যয় প্রায় ৩০% সাশ্রয়ী হয়।</li>
                                    <li>এই ইট সাউন্ড প্রুফ ও তাপ নিয়ন্ত্রক হওয়ায় আরামদ্বায়ক।</li>
                                    <li>ই ইটের মূল্য প্রায় মাটির ইটের সমান বা একটু বেশী হলেও ভবন নির্মানে গড় ব্যয় কম হয় ৩০% ।</li>
                                    <li>এই ইট যে কোন কালার করা যায়। ও যে কোন সাইজের করা যায় ।</li>
                                    <li>হলো ব্লক দিয়ে বাড়ী নির্মানে ব্যয় আরো কমে এবং ভবনের গড় ওজন কমে।</li>
                                    <li>এই ইট ব্যবহারে পরিবেশ রক্ষায় আপনার অংশিদারিত্ব প্রকাশ পায়।</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5">
                    <br><br>
                    <div class="call-to-action call-to-action-colored" style="background-color: #2250fc;border-radius: 10px;">
                      <h5 style="color: white">
                        ইট ভাটা মালিক/ শিল্প উদ্যোক্তাগণ, প্রকল্প, মেশিনারীজ এবং প্রযুক্তি সম্পর্কে জানতে যোগাযোগ করুন।
                      </h5>
                      {{-- <p>
                        This is a simple hero unit, a simple call-to-action-style
                        component for calling extra attention to featured content.
                      </p> --}}
                      <a href="{{route('frontend_contact_us')}}" class="btn btn-outline btn-light">যোগাযোগ করুন</a>
                    </div>
                  </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2><span style="color: #2250fc;">Awards & Certificate</span></h2>
            </div>
            <div class="carousel" data-items="3" data-dots="false" data-lightbox="gallery">
                @foreach($certificates as $certificate)
                    <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image" >
                                <a href="#"><img style="height: 380px !important;" src="{{ asset($certificate->image) }}" alt=""></a>
                            </div>
                            <div class="portfolio-description">
                                <a title="Paper Pouch!" data-lightbox="gallery-image" href="{{ asset($certificate->image) }}" class="btn btn-light btn-rounded">Zoom</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </section>
    <!-- VIDEO GALLERIES -->
    <section class="videoSection">
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2 style="color: #2250fc;">OUR PRODUCT VIDEO</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel" data-items="3">
                        <!-- Post item-->
                        @foreach($videoGalleries as $videoGallery)
                            <div class="post-item border">
                                <div class="post-item-wrap">
                                    <iframe width="560" height="315" src="{{ $videoGallery->youtube_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endforeach
                        <!-- end: Post item-->
                    </div>
                </div>

            </div>
               <!--Team members shadow-->
               <div class="heading-text heading-line text-center mt-60 mb-30">
                <h2> <span style="color: #2250fc;">Contact Persons</span></h2>
            </div>
            <div class="carousel team-members team-members-shadow" data-arrows="false" data-margin="20" data-items="6">
                @foreach($teams as $team)
                <div class="team-member" style="height: 318px !important;">
                    <div class="team-image" style="height: 160px !important;">
                        <img src="{{asset($team->image)}}">
                    </div>
                    <div class="team-desc">
                        <h3>{{$team->name ?? ''}}</h3>
                        <span>{{$team->designation ?? ''}}</span>
                        {{-- <p>{{$team->short_bio ?? ''}}</p> --}}
                        <div class="align-center">
                            <a class="btn btn-xs btn-slide btn-light" target="_blank" href="tel:{{$team->phone ?? '#'}}">
                                <i class="fa fa-phone"></i>
                                <span>Phone</span></a>
                            <a class="btn btn-xs btn-slide btn-light" target="_blank" href="{{$team->whats_app_link ?? '#'}}" data-width="100">
                                <i class="fab fa-whatsapp"></i>
                                <span>WhatsApp</span></a>
                            <a class="btn btn-xs btn-slide btn-light" target="_blank" href="{{$team->we_chat_link ?? '#'}}" data-width="118">
                                <i class="fab fa-weixin"></i>
                                <span>We Chat</span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--END: Team members shadow-->
        </div>
    </section>
    <!-- end: VIDEO GALLERIES  -->
    <!-- COUNTERS -->
    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h2><span style="color: #2250fc;">News & Event</span></h2>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div id="blog" class="grid-layout post-3-columns m-b-30 grid-loaded" data-item="post-item" style="margin: 0px -20px -20px 0px; position: relative; height: 1635.94px;">
                <!-- Post item-->
                @foreach($news as $item)
                <div class="post-item border" style="padding: 0px 20px 20px 0px; position: absolute; left: 0px; top: 0px;">
                    <div class="post-item-wrap">
                        <div class="post-image">
                            <a href="{{ route('frontend_news_and_event_details',['newsId'=>encrypt($item->id)]) }}"> <img alt="" style="height: 350px; width:355px;" src="{{ asset($item->image) }}">
                            </a>
                            @if($item->type==1)
                            <span class="post-meta-category"><a href="{{ route('frontend_news_and_event_details',['newsId'=>encrypt($item->id)]) }}">News</a></span>
                            @else
                            <span class="post-meta-category" style="background-color: #f58902;"><a href="">Event</a></span>
                            @endif
                        </div>
                        <div class="post-item-description">
                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}</span>
                            <h2><a href="{{ route('frontend_news_and_event_details',['newsId'=>encrypt($item->id)]) }}">{{$item->title ?? ''}}</a></h2>
                            <p>{!! \Illuminate\Support\Str::limit($item->description,137) !!}</p>
                            <a href="{{ route('frontend_news_and_event_details',['newsId'=>encrypt($item->id)]) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- end: Post item-->
            <div class="grid-loader"></div></div>
        </div>
    </section>

    {{-- gallery --}}

    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h2><span style="color: #2250fc;">Gallery</span></h2>
            </div>
        </div>
    </section>
    <section id="page-content">
        <div class="container">
            <!-- Gallery -->
            <div class="grid-layout grid-3-columns" data-margin="20" data-item="grid-item" data-lightbox="gallery">
                @foreach($galleries as $gallery)
                    <div class="grid-item">
                        <a class="image-hover-zoom" href="{{ asset($gallery->image) }}" data-lightbox="gallery-image"><img class="img_height" src="{{ asset($gallery->image) }}"></a>
                    </div>
                @endforeach
            </div>
            <!-- end: Gallery -->
        </div>
    </section> <!-- end: Content -->


        <!-- Stats video background-->
        <section class="text-light" style="background-image: url('{{ asset('themes/frontend/images/counter.jpg') }}'); background-size: cover; background-position: center;">
            <div class="" data-style="5"></div>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <!-- Stats item -->
                        <div class="text-center mb-2" style="margin-top: 50px !important;">
                                <span class="mb-10" style="font-size: 45px !important;"><b>21+</b></span>
                            <p class="lead">EXPERIENCE</p>
                        </div>
                        <!-- end: Stats item-->
                    </div>
                    <div class="col-md-3">
                        <!-- Stats -->
                          <div class="text-center mb-2" style="margin-top: 50px !important;">
                                <span class="mb-10" style="font-size: 45px !important;"><b>188+</b></span>
                                <p class="lead">FINISHED PROJECT</p>
                        </div>
                        <!-- end: Stats item-->
                    </div>
                    <div class="col-md-3">
                        <!-- Stats -->
                           <div class="text-center mb-2" style="margin-top: 50px !important;">
                                <span class="mb-10" style="font-size: 45px !important;"><b>59+</b></span>
                                <p class="lead">TEAM MEMBERS</p>
                        </div>
                        <!-- end: Stats item -->
                    </div>
                    <div class="col-md-3">
                        <!-- Stats -->
                           <div class="text-center mb-2" style="margin-top: 50px !important;">
                                <span class="mb-10" style="font-size: 45px !important;"><b>50+</b></span>
                            <p class="lead">AWARDS & ACHIEVEMENTS</p>
                        </div>
                        <!-- end: Stats item -->
                    </div>
                </div>
            </div>
        </section>


     <!-- Modal -->
     {{-- <div id="modalShop" class="modal modal-auto-open no-padding" data-delay="3000" style="max-width: 700px; height:470px !important;">
        <div class="row">
            <div class="col-md-12 col-sm-12 no-padding">
                <img src="{{ asset('themes/frontend/images/shop-bg.jpg') }}" height="470px !important" alt="">
            </div>
        </div>
    </div> --}}
    <!--end: Modal -->

@endsection
@section('script')
    <script>
         $(document).ready(function() {
            @foreach(App\Models\Category::get() as $key => $category)
                $("#knitwear{{ $key + 1 }}").click(function() {
                    window.open('{{ route("frontend_product", ["categoryId" => encrypt($category->id)]) }}', '_blank');
                });
            @endforeach
        });
    </script>


@endsection

