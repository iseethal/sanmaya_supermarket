@extends('frontend.master')
@section('main')

@include('frontend.body.header')


 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>Testimonials</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    <!--testimonial section area -->
    <div class="about_section mt-60">
        <div class="container">  
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about_thumb">
                        <img src="assets/img/about/about1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about_content">
                        <h1>Welcome To Pallas Store!</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta impedit velit maiores nemo perferendis facere a assumenda in sint illo provident pariatur ullam voluptates id eveniet optio neque perspiciatis dolores quod, quisquam! Repellendus alias laudantium nesciunt nostrum magnam debitis quidem aut temporibus expedita accusantium, illum ipsam eos, eveniet explicabo assumenda, laboriosam modi fugiat dolores dolor sit.</p>
                        <div class="view__work">
                            <a href="#">view work </a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>     
    </div>
    <!--testimonial section end-->
    
@endsection