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
                            <li><a style="text-decoration: none;"  href="/">home</a></li>
                            <li>about us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

     <!--about section area -->
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
                        <h1>Welcome to Sanmay Supermarket!</h1>
                        <p>Sanmay Super Mart, is our new venture which started from January 2023. We are retailers of food products and grocery items, and we  deliver items at your doorsteps too!.
Our vision is to help bringing the quality traditional & home-made products (flour and powders) to our customers;
We believe in collective community growth and so, we procure items from local mills & home-made sellers to support the small scale businesses.
In this busy world, making time & visiting multiples shops for grocery items is very tedious, especially  for the working class & old age people, this is where we, Sanmay Super Mart, come to help. We take your orders (including bulk & party orders) and deliver items at your convenience, and you could have tension-free evenings. The time spent to arrange the grocery and vegetables could be utilised elsewhere more productively. Come, shop with us and see what's in stock. "You need it we got it".</p>
                        <!-- <div class="view__work">
                            <a href="#">view work </a>
                        </div>  -->
                    </div>
                </div>
            </div>
        </div>     
    </div>
    <!--about section end-->

    <!--counterup area -->
    <!-- <div class="counterup_section">
        <div class="container">   
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_counterup">
                       <div class="counter_img">
                            <img src="assets/img/about/count.png" alt="">
                        </div>
                        <div class="counter_info">
                            <h2 class="counter_number">2170</h2>
                            <p>Happy customers</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_counterup count-two">
                        <div class="counter_img">
                            <img src="assets/img/about/count2.png" alt="">
                        </div>
                        <div class="counter_info">
                            <h2 class="counter_number">8080</h2>
                            <p>AWARDS won</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_counterup">
                        <div class="counter_img">
                            <img src="assets/img/about/count3.png" alt="">
                        </div>
                        <div class="counter_info">
                            <h2 class="counter_number">2150</h2>
                            <p>HOURS WORKED</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_counterup count-two">
                        <div class="counter_img">
                            <img src="assets/img/about/count4.png" alt="">
                        </div>
                        <div class="counter_info">
                            <h2 class="counter_number">2170</h2>
                            <p>COMPLETE PROJECTS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div> -->
    <!--counterup end-->


@endsection