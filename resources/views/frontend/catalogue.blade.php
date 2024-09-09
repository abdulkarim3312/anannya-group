@extends('layouts.master')
@section('title', 'Catalogue')
@section('style')

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
                <h1 class="text-bold" style="color: {{ $catalogue->text_color ?? ''}};">Our Prodcut Catalogue</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container" style="margin-top: -50px;">
            <div class="">
                <iframe src="{{ asset($catalogue->catalogue_file ?? '') }}" width="40%" height="1000"></iframe>
            </div>
        </div>
    </section>

@endsection
