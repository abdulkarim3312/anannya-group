@extends('layouts.master')
@section('title','Gallery')
@section('style')

@endsection

@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="{{ asset('themes/frontend/images/parallax/14.jpg') }}">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-uppercase text-medium">Bricks And Tiles</h1>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <section class="p-b-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-text heading-section">
                        <h2>ABOUT COMPANY</h2>
                        <span class="lead">Quick Feed’s (PVT) Ltd is mainly well known for collecting feed and raw materials from different places in Bangladesh and supplying to factories according to their needs all over Bangladesh. The products are Rhapsody, Sayake, Corn, DOB, Dry Fees, CGM, and Poultry Mill for poultry food. Besides these, Quick Feed’s (PVT) Ltd imports and exports all types of animal feed medicine with great care.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-b-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-text heading-section">
                        <h2>OUR VISION</h2>
                        <span class="lead">The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. A true story, that never been told!. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor. </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-b-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-text heading-section">
                        <h2>OUR MISSION</h2>
                        <span class="lead">The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. A true story, that never been told!. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor. </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>WHAT WE DO</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div>
                        <h4>Web Development</h4>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <h4>Social Marketing</h4>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <h4>Graphic Design</h4>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <h4>Web Design</h4>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <h4>App Development</h4>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <h4>Hosting services</h4>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="seperator"><i class="fa fa-chevron-down"></i>
    </div>
    <section>
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>OUR CLIENTS</h2>
            </div>
            <ul class="grid grid-5-columns">
                @foreach($clients as $client)
                    <li>
                        <a href="#"><img src="{{ asset($client->image) }}" alt="">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- Content -->
    <section>
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>GALLERY</h2>
            </div>
            <div class="carousel" data-items="3" data-dots="false" data-lightbox="gallery">
                @foreach($galleries as $gallery)
                    <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="{{ asset($gallery->image) }}" alt=""></a>
                            </div>
                            <div class="portfolio-description">
                                <a title="Paper Pouch!" data-lightbox="gallery-image" href="{{ asset($gallery->image) }}" class="btn btn-light btn-rounded">Zoom</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> <!-- end: Content -->
    <!-- VIDEO GALLERIES -->
    <section>
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>VIDEO GALLERY</h2>
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
        </div>
    </section>
    <!-- end: VIDEO GALLERIES  -->
@endsection
