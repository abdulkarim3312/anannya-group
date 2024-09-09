
<style>
    #header .header-inner #logo a > img, #header .header-inner #logo a [class*="logo-"], #header #header-wrap #logo a > img, #header #header-wrap #logo a [class*="logo-"] {
        display: block !important;
        padding-top: 4px;
    }



    @media only screen and (max-width: 1025px) {
        #mainMenu nav > ul > li > a {
            color: #000;
        }
    }

</style>
<header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light">
    <div class="header-inner" style="background-color: #2178D8">
        <div class="container">
            <!--Logo-->
            <div id="logo" class="text-left">
                <a href="{{ route('frontend_home') }}"><span class="logo-dark ml-4"><img src="{{ asset('img/logo.png') }}" width="90"></span></a>
            </div>
            <!--End: Logo-->
            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <a class="lines-button x"><span class="lines"></span></a>
            </div>
            <!--end: Navigation Resposnive Trigger-->
            <!--Navigation-->
            <div id="mainMenu">
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="{{ route('frontend_home') }}">Home</a></li>
                            <li class="dropdown"><a href="#">Products</a>
                                <ul class="dropdown-menu">
                                    @foreach(App\Models\Category::get() as $category)
                                        <li><a href="{{ route('frontend_product', ['categoryId' => encrypt($category->id)]) }}">{{ $category->name ?? '' }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('frontend_gallery') }}">Gallery</a></li>
                            <li><a href="{{ route('catalogue_font') }}">Catalogue</a></li>
                            <li><a href="{{ route('frontend_news_and_event') }}">News & Event</a></li>
                            <li><a href="{{ route('frontend_about_us') }}">About Us</a></li>
                            <li><a href="{{ route('frontend_contact_us') }}">Contact Us</a></li>
                            <li style="margin-right:-12px;"><a target="_blank" href="https://www.facebook.com/chinabricksmachinery2003" data-width="100"> <i class="fab fa-facebook-f"></i></a></li>
                            <li><a style="padding-left: 0px !important;" target="_blank" href="https://youtube.com/@ecobricksmachinery9120?si=UbhO6A8eDfQCcIIj" data-width="100" > <i class="fab fa-youtube"></i></a></li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>
<!-- end: Header -->


