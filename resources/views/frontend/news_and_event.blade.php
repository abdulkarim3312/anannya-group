@extends('layouts.master')
@section('title', 'News & Event')
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
                <h1 style="color: #2250fc;">News & Event</h1>
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

@endsection
