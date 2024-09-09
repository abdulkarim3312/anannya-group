@extends('layouts.master')
@section('title','Gallery')
@section('style')

@endsection

@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="{{ asset('themes/frontend/images/parallax/5.jpg') }}">
        <div class="container">
            <div class="page-title">
                <h1>Contact Us</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('frontend_home') }}">Home</a> </li>
                    <li class="active"><a href="#">Contact Us</a> </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <!-- CONTENT -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-uppercase" style="color: #2250fc;">Get In Touch</h3>
                    <p>The most happiest time of the day!. Suspendisse condimentum porttitor cursus. Duis nec nulla turpis. Nulla lacinia laoreet odio, non lacinia nisl malesuada vel. Aenean malesuada fermentum bibendum.</p>
                    <div class="m-t-30">
                        <form action="{{route('message_add')}}" method="POST"  class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" required class="form-control" name="name" value="{{old('name')}}" placeholder="Your Name" > <i class="fal fa-user"></i>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="tel" class="form-control" value="{{old('number')}}" required name="number" id="number" placeholder="Phone Number"> <i class="fal fa-phone"></i>
                                </div>
                                <div class="form-group col-12">
                                    <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Your Message">{{old('message')}}</textarea> <i class="fal fa-comment"></i>
                                </div>
                                <div class="form-btn text-xl-left text-left col-12">
                                    <button class="btn" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="text-uppercase" style="color: #2250fc;">Address & Map</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <address>
                                <strong>Head Office</strong><br>
                                House No-120 (4th Floor),Road No:12,Sector No:10, Uttara-1230, Dhaka, Bangladesh.
                                <b>Phone:</b></h4><a href="tel:+880 1324-448350">+880 1324-448350</a>  <br>
                                <b>Phone:</b></h4><a href="tel:+880 1324-448333">+880 1324-448333</a>  <br>
                                <b>Email:</b></h4> <a href="mailto:anannya.group.info@gmail.com">anannya.group.info@gmail.com</a> <br>
                                <b>Web:</b></h4> <a href="https://anannyagroup.com" target="_blank">anannyagroup.com</a><br>
                                <b>Web:</b></h4> <a href="https://habibsun.com.com" target="_blank">habibsun.com</a>
                            </address>
                        </div>
                        <div class="col-lg-6">
                            <address>
                                <strong>Corporate Office</strong><br>
                                Cinema Hall Road,Chinabazar-71<br>
                                2nd Flooor, Panchagarh-5000<br>
                                <b>Phone:</b></h4> <a href="tel:+880 1324-448352">+880 1324-448352</a> <br>
                                <b>Phone:</b></h4> <a href="tel:+880 1324-448351">+880 1324-448351</a> <br>
                                <b>Web:</b></h4> <a href="https://chinabazar71.com" target="_blank">chinabazar71.com</a>
                            </address>
                        </div>
                    </div>
                    <!-- Google Map -->
                     <div class="section">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d1824.0876227639976!2d90.3903473!3d23.8834037!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3755c563692d1331%3A0x7f9b5b5ffb362031!2sEssence%20Bilkis%205%20Road%20No.%2012%20Dhaka%201230!3m2!1d23.8834043!2d90.3903495!5e0!3m2!1sen!2sbd!4v1716619528549!5m2!1sen!2sbd" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    <!-- end: Google Map -->
                </div>
            </div>
        </div>
    </section> <!-- end: Content -->
@endsection
