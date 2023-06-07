@extends('frontend.master')

@section('main')

@include('frontend.body.header')

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    .page-item.active .page-link {
        background: #EA000D !important;
        border-color: #EA000D !important;
    color: #FFFFFF !important;
    }
    .linkcolor{
        color:black !important;
        text-decoration:none !important;
    }
    .linkcolor:hover{
        color:#EA000D !important;
    }
    @media only screen and (max-width: 767px)
    {
  .pagination {
    padding-bottom:20px;
     }
    }
</style>

<?php 
use App\Models\Product;
use App\Models\Category;

use App\Http\Controllers\Frontend\ShopController;

?>


 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a style="text-decoration: none;"  href="/">home</a></li>
                            <li>shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

  <br>

  @if(session()->has('message'))
       <center>
        <div class="alert alert-success alert-dismissible" style="max-width:926px;">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session()->get('message') }}
        </div>
       </center>
    @endif
    
    <div class="shop_area shop_reverse mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                   <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="shop_sidebar_banner mb-50">
                            <a><img src="assets/img/bg/banner16.jpg" alt=""></a>
                        </div>
                        <div class="widget_list widget_categories">
                            <h2>categories</h2>                           
                            <ul>
@foreach($categories as $row)

@php

$url =  url()->full();
$query_str = parse_url($url, PHP_URL_QUERY);                               
parse_str($query_str, $query_params);

$row_style="";


if( $query_params==null ){

$row_style='style=color:red; ';
}

$All_products = Product::where('is_deleted','<>','1')->count('products.id');

@endphp 
@endforeach

                        <li> <a  class="linkcolor" href="shop"  >All <span><b> {{ $All_products }} </b></span></a></li>


 @foreach($categories as $row)


@php

 
$url =  url()->full();
$query_str = parse_url($url, PHP_URL_QUERY);                               
parse_str($query_str, $query_params);


$rows = Product::where('is_deleted','<>','1')->where('id', $row['id'])->get();               
       
$row_style="";


if($rows == null && $row['id']!=null && $query_params!=null && $query_params['id']!=null && $row['id']==$query_params['id']){
   $row_style='style=color:red; ';
}

$count = Product::where('is_deleted','<>','1')->where('category_id',$row['id'])->count('products.category_id');

@endphp 
@if ($count > 0) 
                            <li> 
                         <a   class="linkcolor" href="{{ route('shop',['id'=>$row['id']]) }}" {{ $row_style }}>{{ $row['title'] }} <span><b> {{ $count }}</b></span> </a> 
                                </li>
                               
 @endif

 @endforeach

                            </ul>
                        </div>

                        <div class="shop_sidebar_banner mb-50">
                            <a><img src="assets/img/bg/banner12.jpg" alt=""></a>
                        </div>


                        

                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_banner">
                        <img src="assets/img/bg/banner29.jpg" alt="">
                    </div>

                    
                    <div class="shop_title">
                        <h1>shop</h1>
                    </div>

                    
                    <br>
                         

                    <!--shop toolbar end-->

                    <div class="shop_toolbar_wrapper">
                     

                        <div class="page_amount">
                            
                            <p><b>Showing {{ $products->firstItem() }} – {{ $products->lastItem() }} of {{ $products->total() }} results</b></p>
                        </div>

 

                    </div>
                    <!--shop toolbar end-->

          @php
            $quantity_ARR 	= array();
            $amount_ARR 	= array();
            foreach ($quantity as $item2){  

              $quantity_id     	= $item2->product_id;
              $product_amount 	= $item2->amount;  
              $product_quantity 	= $item2->quantity; 

              $quantity_ARR[$quantity_id] 	= $product_quantity;
              $amount_ARR[$quantity_id] 	= $product_amount;  
                }
	        @endphp
 
                   
            <div class="row no-gutters ">
           
                     @foreach($products as $product)

                        <div class="col-lg-4 col-md-4 col-12 ">

                            <div class="single_product">
                                <div class="product_thumb" style="padding:10px">
                                        <a href="{{ route('product_details',['id'=>$product['id']]) }}"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$product->image ) }}" alt=""></a>
                                  
                                    <!-- {{ asset('images/product_images/'.$product->image) }} -->
                                   
                                </div>	
                                <div class="product_content grid_content">
                                    <div class="product_name">
                                        <h3><a class="linkcolor" href="{{ route('product_details',['id'=>$product['id']]) }}" id="pname">{{ Str::limit($product->title, 25) }}</a></h3>
                                    </div>

                    
                                   
                                     <div class="price_box">
                                        <span class="current_price">₹ {{ $amount_ARR[$product->id] }} </span>
                                    </div>

                   
                                   
                                </div>
                                
                                <div class="product_content list_content">
                                    <div class="product_name">
                                        <h3><a href="{{ route('product_details',['id'=>$product['id']]) }}" >{{ $product->title }}</a></h3>
                                    </div>
                                    
                                     <div class="price_box">
                                        <span class="current_price">₹ {{ $amount_ARR[$product->id] }}</span>
                                    </div>
                                   

                                    
                                </div>
                            </div>


                        </div>
                        
                        @endforeach
                      
            </div>
                  
          
               <br><br>
  <div class="pagination d-flex justify-content-center">
    
  
{{$products->links()}}
</div>



   </div>
                  
   
    </section>


                    
                    
                </div>
            </div>
        </div>
    </div>

   
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
   


@endsection