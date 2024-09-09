@extends('layouts.master')
@section('title','News & Events')
@section('style')

@endsection

@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="{{ asset('themes/frontend/images/parallax/5.jpg') }}">
        <div class="container">
            <div class="page-title">
                <h1>News & Events</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('frontend_home') }}">Home</a>
                    </li>
                    <li class="active"><a href="#"><span style="color: #1d8d07;">News & Events</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <!-- Content -->
    <section id="page-content">
        <div class="container">
            <div class="row">
                <!-- content -->
                <div class="content col-lg-12">
                    <!-- Blog -->
                    <div id="blog" class="single-post">
                        <!-- Post single item-->
                        <div class="post-item">
                            <div class="post-item-wrap">
                                <div class="post-image">
                                    <a href="#">
                                        <img alt="" src="{{ asset($newsAndEvent->image) }}">
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <h2>{{$newsAndEvent->title ?? ''}}</h2>
                                    <div class="post-meta">
                                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{ date('M d, Y',strtotime($newsAndEvent->created_at)) }}</span>
                                    </div>
                                    {!! $newsAndEvent->description !!}
                                </div>
                                <div class="post-navigation">
                                    @if($prevNews)
                                        <a href="{{ route('frontend_news_and_event_details',['newsId'=>encrypt($prevNews->id)]) }}" class="post-prev">
                                            <div class="post-prev-title"><span>Previous Post</span>{{ $prevNews->title }}</div>
                                        </a>
                                    @endif
                                    <a href="#" class="post-all">
                                        <i class="icon-grid"> </i>
                                    </a>
                                    @if($nextNews)
                                        <a href="{{ route('frontend_news_and_event_details',['newsId'=>encrypt($nextNews->id)]) }}" class="post-next">
                                            <div class="post-next-title"><span>Next Post</span>{{ $nextNews->title }}</div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end: Post single item-->
                    </div>
                </div>
                <!-- end: content -->
            </div>
        </div>
    </section> <!-- end: Content -->
@endsection
