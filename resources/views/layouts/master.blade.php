<!DOCTYPE html>
<html lang="en">
    @php
        $teamHead = App\Models\Team::where('id',5)->first();
        $teams = App\Models\Team::where('id',6)->first();
        $teamone = App\Models\Team::where('id',8)->first();
        $teamTwo = App\Models\Team::where('id',9)->first();
        // dd($teams);
    @endphp
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>@yield('title') | {{ config('app.name', '') }}</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('themes/frontend/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/frontend/css/animate.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('themes/frontend/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('themes/frontend/css/default.css') }}">
    <link href="{{ asset('themes/frontend/css/slick.css') }}" rel="stylesheet">

    <link href="{{ asset('themes/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/frontend/css/custom_style.css') }}" rel="stylesheet">
     <!-- Toastr -->
     <script src="{{ asset('themes/frontend/toastr/toastr.min.js') }}"></script>
    <style>
        .team-members .team-member {
            border: 2px solid #1d8d07;
        }
        .infetech-banner-area-layout-2 .infetech-banner-slide-item .infetech-banner-content .info-text .title {
            font-size: 90px;
            color: #fff;
            padding-top: 39px;
            padding-bottom: 16px;
        }

        .infetech-banner-area-layout-2 .infetech-banner-slide-item .infetech-banner-content .info-text p {
            font-size: 18px;
            font-weight: 500;
            color: #fff;
            opacity: 0.7;
            padding-right: 50px;
            margin-bottom: 42px;
        }

        .infetech-banner-area-layout-2 .infetech-banner-slide-item .infetech-banner-content .play-btn a {
            height: 60px;
            width: 60px;
            text-align: center;
            line-height: 60px;
            border-radius: 50%;
            color: #fff;
            background: #1d8d07;
            position: relative;
        }

        .infetech-banner-area-layout-2 .infetech-banner-slide-item .infetech-banner-content .play-btn a::before {
            position: absolute;
            content: '';
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            border: 1px solid #fff;
            border-radius: 50%;
            animation: play-popup 1.5s infinite;
        }

        @keyframes play-popup {
            from {
                transform: scale(1);
                opacity: 1;
            }

            to {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        #footer li a {
            padding: 5px;
        }

        #footer .grid li {
            padding: 15px;
            background: #3c1bc1;
        }

        #footer .grid li:hover {
            background: #830a95;
        }
        .whatapps-msg {
            position: fixed;
            right: 24px;
            bottom: 88px;
            width: 60px;
            height: 60px;
            box-shadow: rgb(0 0 0 / 15%) 0px 4px 12px 0px;
            border-radius: 50%;
            line-height: 60px;
            text-align: center;
            background: #26D467;
            z-index: 999999;
        }

        .whatapps-msg img {
            height: 100%;
            width: 100;
            object-fit: cover;
        }


        .whatapps-msg a {
            color: #fff;
            font-size: 46px;
        }
        #mainMenu nav>ul>li>a{
            color: #fff;
        }
        
        .list-icon i {
        	line-height: 30px;
        	font-size: 11px;
        	letter-spacing: 2px;
        }
        
    </style>
    @yield('style')
    
     <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css"
      >
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        @include('frontend.partials.header')
        @yield('content')
        @include('frontend.partials.footer')
    </div>
    <div class="whatapps-msg" style="margin-bottom: 316px;">
        <a target="_blank" href="{{$teamHead->whats_app_link ?? '#'}}"><img src="{{asset($teamHead->image ?? '')}}" alt="" style="border-radius: 50%;"></a>
    </div>

    <div class="whatapps-msg" style="margin-bottom: 244px;">
        <a target="_blank" href="{{$teams->whats_app_link ?? '#'}}"><img src="{{asset($teams->image ?? '')}}" alt="" style="border-radius: 50%;"></a>
    </div>

    <div class="whatapps-msg" style="margin-bottom: 162px;">
        <a target="_blank" href="{{$teamone->we_chat_link ?? '#'}}"><img src="{{asset($teamone->image ?? '')}}" alt="" style="border-radius: 50%;"></a>
    </div>

    <div class="whatapps-msg" style="margin-bottom: 75px;">
        <a target="_blank" href="{{$teamTwo->whats_app_link ?? '#'}}"><img src="{{asset($teamTwo->image ?? '')}}" alt="" style="border-radius: 50%;"></a>
    </div>
    <div class="whatapps-msg">
        <a target="_blank" href="https://wa.me/+8801324448300"><i class="fab fa-whatsapp mt-2"></i></a>
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop">
        <i class="fas fa-chevron-up"></i>
        <i class="fas fa-chevron-up"></i>
    </a>
    <!--Plugins-->

    {{-- <script src="{{ asset('themes/frontend/js/modernizr-3.6.0.min.js') }}"></script> --}}
    <script src="{{ asset('themes/frontend/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('themes/frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('themes/frontend/js/wow.js') }}"></script>
    <script src="{{ asset('themes/frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('themes/frontend/js/waypoints.min.js') }}"></script>

    <script src="{{ asset('themes/frontend/js/main.js') }}"></script>
    <!--Google Maps files-->
    <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyBOksKHb9HyydVB-mcrqKUVfA_LeB79jcQ'>
    </script>
    <script type="text/javascript" src="{{ asset('themes/frontend/plugins/gmap3/gmap3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/frontend/plugins/gmap3/map-styles.js') }}"></script>
    <!--Infinite Scroll plugin files-->
    <script src="{{ asset('themes/frontend/plugins/metafizzy/infinite-scroll.min.js') }}"></script>
     <!-- Toastr -->
     <script src="{{ asset('themes/frontend/toastr/toastr.min.js') }}"></script>
     <!--Template functions-->
     <script src="{{ asset('themes/frontend/js/jquery.js') }}"></script>
     <script src="{{ asset('themes/frontend/js/plugins.js') }}"></script>
     <script src="{{ asset('themes/frontend/js/functions.js') }}"></script>
     <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var message = '{{ session('message') }}';
            var error = '{{ session('error') }}';

            if (!window.performance || window.performance.navigation.type != window.performance.navigation
                .TYPE_BACK_FORWARD) {
                if (message != '')
                    $(document).Toasts('create', {
                        icon: 'fas fa-envelope fa-lg',
                        class: 'bg-success',
                        title: 'Success',
                        autohide: true,
                        delay: 2000,
                        body: message
                    })

                if (error != '')
                    $(document).Toasts('create', {
                        icon: 'fas fa-envelope fa-lg',
                        class: 'bg-danger',
                        title: 'Error',
                        autohide: true,
                        delay: 5000,
                        body: error
                    })
            }
        });
    </script>
    @yield('script')
</body>

</html>
