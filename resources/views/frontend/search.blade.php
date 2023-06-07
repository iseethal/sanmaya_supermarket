@extends('frontend.master')

@section('main')

@include('frontend.body.header')

<style>
    .page-item.active .page-link {
        background: #EA000D !important;
        border-color: #EA000D !important;
    color: #FFFFFF !important;
    }
    @media only screen and (max-width: 767px)
    {
  .pagination {
    padding-bottom:20px;
     }
    }
</style>
 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a style="text-decoration: none; " href="/">home</a></li>
                            <li> Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

  

    @if(session()->has('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
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
                       
                        <div class="shop_sidebar_banner mb-50">
                            <a><img src="assets/img/bg/banner12.jpg" alt=""></a>
                        </div>

                    </aside>
                    <!--sidebar widget end-->
                </div>
      @if(!$products->isEmpty())

                <div class="col-lg-9 col-md-12">
                  
                    
                    <div class="shop_title">
                        <h3> Products</h3>
                    </div>

                    
                    <br>
                         

                    <!--shop toolbar end-->

                    <div class="shop_toolbar_wrapper">
                     

                        <div class="page_amount">
                            
                            <p><b>Showing {{ $products->firstItem() }} – {{ $products->lastItem() }} of {{ $products->total() }} results</b></p>
                        </div>

 

                    </div>
                    <!--shop toolbar end-->

                    
 
                   
            <div class="row no-gutters">

         @php
            $quantity_ARR 	= array();
            $amount_ARR 	= array();
            foreach ($quantities as $item2){  

            $quantity_id     	= $item2->product_id;
            $product_amount 	= $item2->amount;  
            $product_quantity 	= $item2->quantity; 

            $quantity_ARR[$quantity_id] 	= $product_quantity;
            $amount_ARR[$quantity_id] 	= $product_amount;  
            }

	    @endphp
           
                     @foreach($products as $product)                   

                        <div class="col-lg-4 col-md-4 col-12 ">

                            <div class="single_product">
                                <div class="product_thumb" style="padding:10px">
                                        <a href="{{ route('product_details',['id'=>$product['id']]) }}"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$product->image ) }}" alt=""></a>
                                  
                                    <!-- {{ asset('images/product_images/'.$product->image) }} -->
                                   
                                </div>	
                                <div class="product_content grid_content">
                                    <div class="product_name">
                                        <h3><a href="{{ route('product_details',['id'=>$product['id']]) }}" id="pname">{{ Str::limit($product->title, 25) }}</a></h3>
                                    </div>

                    
                                   
                                     <div class="price_box">
                                        <span class="current_price">₹  {{ $amount_ARR[$product->id] }} </span>
                                    </div>

                   
                                   
                                </div>
                                
                                <div class="product_content list_content">
                                    <div class="product_name">
                                        <h3><a href="product-details.html">{{ $product->title }}</a></h3>
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

@else
<div class="container" style="margin-top: 25px;width: 40%;">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body">
                <center>
                    <h4>Currently unavailable </h4>
                    <a href="{{ route('shop') }}">back to the shop page</a>
                </center>
            </div>
        </div>
    </div>
</div>


 @endif

   
  


@endsection