@extends('layouts.master')
@section('title', 'About Us')
@section('style')
@endsection
<style>
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

    #vision_area {
        padding: 0px;
        position: relative;
        z-index: 99;
        margin-top: -55px;
        background: transparent;
    }
    .frontText{
        color: white !important;
        padding: 10px;
    }
    .frontText p{
        font-size: 14px !important;
    }
    .chItem{
        font-size:25px;
        padding-right: 10px;
    }
    .EXPERIENCEp{
        font-size: 18px bold;
        color: black;
    }
    .list{
        font-size: 16px bold;
        color: black;
    }
</style>
@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="{{ asset('themes/frontend/images/parallax/14.jpg') }}">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-uppercase text-medium">ABOUT US</h1>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <section class="p-b-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6  mb-5">
                    <div data-animate="fadeInUp" data-animate-delay="0">
                        <img src="{{ asset('themes/frontend/images/about_us.jpg') }}" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="heading-text heading-section">
                        <h2 style="color: #2250fc;">THE COMPANY</h2>
                        <span class="lead">
                            শেখ হাসিনার নির্দেশ, পরিবেশ বান্ধব বাংলাদেশ। এই স্লোগানকে সামনে রেখেই অনন্যা গ্রুপ দীর্ঘদিন যাবৎ
                            কাজ করে যাচ্ছে পরিবেশ বান্ধব ইট তৈরির প্রকল্প বাস্তবায়নে । আমাদের একটিই লক্ষ, বাংলাদেশ কে পরিবেশ
                            বান্ধব করে গড়ে তোলা ।আর সেই লক্ষেই আমরা কাজ করে যাচ্ছি অনবরত।
                            অনন্যা গ্রুপ, দীর্ঘ ১৬ বছরের অভিজ্ঞতা সম্পন্ন ও বাংলাদেশে ৭০+ টি প্রকল্প স্থাপনকারী এক অনন্য
                            প্রতিষ্ঠান, গণপ্রজাতন্ত্রী বাংলাদেশ সরকার অনুমোদিত ও ২০১৯ সালে পরিবেশ মন্ত্রনালয় হইতে জাতীয়
                            পুরষ্কার প্রাপ্ত প্রতিষ্ঠান বাংলাদেশে পরিবেশবান্ধব ইট তৈরির মেশিন এর এক মাত্র এজেন্ট অনন্যা
                            গ্রুপ।
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top: 0px;">
        <div class="container">
            <div class="col-md-12 text-left pt-3 color-black">
                <h3 class="Title" style="color: #2250fc;">EXPERIENCE OF 23 YEARS</h3>
            </div>
            <div class="col-md-12 text-left pb-3 mb-3">
                <span style="color: #2250fc;font-size:30px"><b>Our Journey</b></span>

            </div>
            <div class="row">

                <div class="col-md-12">
                    <p class="EXPERIENCEp">Anannya Group is Located in Dhaka Bangladesh. The Company Start 2003. Now this enterprise Sister Concern 3 Manufacturers Company and 2 Trading Business Center 2 Business Support Help Center.</p>
                </div>

                <div class="col-md-12"><br>
                    <ul>
                        <li class="list"><b>1.</b>&nbsp;Habib & Sun Trading Co, Ltd. (Eco-Friendly Bricks & Tiles )Block Machininary  Manufacturer Joint Venture Company.</li>
                        <li class="list"><b>2.</b>&nbsp;Sefat Eco–Friendly Brick & Tiles Industries.</li>
                        <li class="list"><b>3.</b>&nbsp;Anannya Woman’s Fashion World. ( Garments Dress ).                        </li>
                        <li class="list"><b>4.</b>&nbsp;Sefat Engineering Workshop.</li>
                        <li class="list"><b>5.</b>&nbsp;Anannya International Trade & Marketing. (Chinabzr71 Online Supper shop, Garments, Electronics, Lather, Shoes, etc. Product Importer & Marketing Company. </li>
                        <li class="list"><b>6.</b>&nbsp;Sefat Agro & Animal Product Farm.</li>
                        <li class="list"><b>7.</b>&nbsp;Managing Director of the Weekly Panchabarta.</li>
                        <li class="list"><b>8.</b>&nbsp;Village Home Development Engineering & Eco –Friend Project Consoltancy Farm.</li>
                        <li class="list"><b>9.</b>&nbsp;Green Bangladesh.</li>
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
    <section style="margin-top: 30px;" id="vision_area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="box-details boxes-id2">
                        <div class="box-icon">
                            <h1 class="box-title">Mission</h1>
                        </div>
                        <div class="bol-info">
                            <p>আর নয় মাটি পোড়ানো ইট - এই স্লোগান কে সামনে রেখে বাংলাদেশ কে পরিবেশ বান্ধব করে তোলাই আমাদের মূল লক্ষ্য।</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="box-details boxes-id1">
                        <div class="box-icon">
                            <h1 class="box-title">Vision</h1>
                        </div>
                        <div class="bol-info">
                            <p>আর নয় মাটি পোড়ানো ইট - এই স্লোগান কে সামনে রেখে বাংলাদেশ কে পরিবেশ বান্ধব করে তোলাই আমাদের মূল লক্ষ্য।</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="box-details boxes-id3">
                        <div class="box-icon">
                            <h1 class="box-title">Slogan</h1>
                        </div>
                        <div class="bol-info">
                            <p>The Stamp of Quality & Professionalism.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="choiceUs mt-5">
            <div class="container">
                <div class="heading-text heading-section text-center">
                    <h2><span style="color: #2250fc;">AUTHORAIATION & AWARD</span></h2>
                </div>
                <div class="row">
                    <div class="col-md-6 p-0">
							<img width="100%" src="{{asset('themes/frontend/images/autorization_latter.jpg')}}" alt="">
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="grid-item mb-3">
                            <div class="grid-item-wrap">
                                <div class="grid-image lazy-bg bg-loaded" data-bg-image="{{asset('themes/frontend/images/autorization_latter.jpg')}}" style="height: 100%; background-image: url('{{ asset('themes/frontend/images/autorization_latter.jpg') }}');" data-bg="{{asset('themes/frontend/images/autorization_latter.jpg')}}" data-ll-status="loaded">
                                    <div class="bg-overlay" style="background:#2250fc !important" data-style="5">
                                        <div class="frontText">
                                            <h3 class="aTitle text-center text-white">AWARD WINNING</h3>
                                            <p class="aCaption text-center text-white mb-5">The Best Workshop.</p>
                                            <div class="d-flex">
                                                        <div class="chItem icon"><i class="far fa-check-circle"></i></div>
                                                        <div class="chItem detils">
                                                            <p class="text-white">Selected for the WQC World Quality Commitment International Star Award- Paris 2013 in recognition of Commitment to Quality, Leadership, Technology and Innovation.</p>
                                                        </div>
                                                    </div>
                                                                                    <div class="d-flex">
                                                        <div class="chItem icon"><i class="far fa-check-circle"></i></div>
                                                        <div class="chItem detils">
                                                            <p class="text-white">On the occasion of World Environment Day 2019, the Government of the People's Republic of Bangladesh "Ministry of Environment, Forests and Climate Change" gave the 2nd award and certificate for the awareness of climate change workshop.</p>
                                                        </div>
                                                    </div>
                                                    <div class="VIEWMORE text-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

                <!--Team members shadow-->
                <div class="heading-text heading-line text-center mt-40 mb-30">
                    <h4 style="color: #2250fc;">Contact Persons</h4>
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
        </div>
    </section>
@endsection
