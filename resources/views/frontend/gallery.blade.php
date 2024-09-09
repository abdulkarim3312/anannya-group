@extends('layouts.master')
@section('title','About Us')
@section('style')
    <style>
        .img_height{
            height: 255px !important;
        }
    </style>
@endsection

@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="{{ asset('themes/frontend/images/parallax/14.jpg') }}">
        <div class="container">
            <div class="page-title">
                <h1>Gallery</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('frontend_home') }}">Home</a>
                    </li>
                    <li class="active"><a href="#">Gallery</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h1 style="color: #2250fc;">Our Programs</h1>
            </div>
        </div>
    </section>
    <!-- Content -->
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
@endsection
