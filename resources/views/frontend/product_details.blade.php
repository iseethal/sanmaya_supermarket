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
                            <li>Product Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    <div class="shop_area shop_reverse mt-50 mb-50">
        <div class="container">
            <div class="row">
              
                    <div class="tab-content">
                <div class="tab-pane fade show active" id="Products7" role="tabpanel">
                    <div class="row">
                        <div class="product_carousel product_style7 product_column4 owl-carousel">
                        @foreach($product as $row)

                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a href="product-details.html"><img src="{{ $row['image'] }}" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">sale</span>
                                        </div>
                                        <div class="quick_button">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h3><a href="product-details.html">{{ $row['title'] }}</a></h3>
                                        </div>
                                      
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                </div>

                
               
            </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>

@endsection