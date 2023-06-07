@extends('frontend.master')

@section('main')

@include('frontend.body.header')

<style>
    a.related_product_name:hover {

        color:red !important;
    }
</style>




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">





<meta name="csrf-token" content="{{ csrf_token() }}">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a style="text-decoration: none; " href="/">Home</a></li>
                            <li><a style="text-decoration: none; " href="/shop">Shop</a></li>
                            <li>Shop Product</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    
    <div class="shop_area shop_reverse mt-50 mb-50">

                    <div class="container">
                        <div class="row product_data">
                            <!-- <div class="card shadow product_data"> -->
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">  
                    

                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->image ) }}" alt=""></a>    
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->support_image1 ) }}" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->support_image2 ) }}" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->support_image3 ) }}" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab5" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->support_image4 ) }}" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab6" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->support_image5 ) }}" alt=""></a>    
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                <div class="modal_tab_button">      
                    <ul class="nav product_navactive owl-carousel" role="tablist">
                    <li >
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->image ) }}" alt=""></a>
                        </li>
                        <li>
                                <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->support_image1 ) }}" alt=""></a>
                        </li>
                        <li>
                            <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->support_image2 ) }}" alt=""></a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->support_image3 ) }}" alt=""></a>
                        </li>
                        <li >
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->support_image4 ) }}" alt=""></a>
                        </li>
                        <li>
                                <a class="nav-link" data-bs-toggle="tab" href="#tab6" role="tab" aria-controls="tab6" aria-selected="false"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$singleProduct->support_image5 ) }}" alt=""></a>
                        </li>

                    </ul>
                </div>    
                </div>  
         </div> 
                            
<div class="col-lg-7 col-md-7 col-sm-12">
<div class="modal_add_to_cart">

<form action="{{ url('addcart',$singleProduct->id) }}" method="POST">
@csrf

<input type="hidden" class="category_id" value="{{ $singleProduct['category_id'] }}">
<div class="modal_right">
<div class="modal_title mb-10">
<input type="hidden" class="title" value="{{ $singleProduct['title'] }}">

    <h2>{{ $singleProduct['title'] }}</h2> 
</div>
                
@foreach($quants as $item) 

@php
   $amount = $item->amount; 
@endphp

<div class="modal_price mb-10">

    <span id="pricespan" class="discounted-price">₹  {{ $item['amount'] }}</span>
    <span id="pricespan_new" class="discounted-price"></span>

</div> 

@endforeach


<div class="modal_description mb-15">
    <p>{!! $singleProduct->description !!}</p>
    
</div> 


<div class="variants_selects">
    <div class="variants_size">
        <h6>Options</h6>
        <select class="select_option" name="amount" id="product_amount" onchange="calculateAmount()">
        
        @foreach($quant as $item) 

                
            @if (old('item')==$item->id)

                <option value={{$item->amount}} selected> {{ $item->amount }}{{ $item['quantity'] }} - ₹ {{ $item['amount'] }} </option>

            @else

                <option value={{$item->amount}} >{{ $item['quantity'] }} - ₹ {{ $item['amount'] }} </option>

            @endif


        @endforeach
            
        </select>
    </div>

    
    </div> 

    <br>
    <div class="shop-product__block shop-product__block--quantity mb-40">
        
        <h6>Quantity:</h6>

        @foreach($quants as $item) 

            <div class="mx-0 pt-0">                

                <input name="product_qty" id="product_qty" type="number" min="0.5" max="100" step="0.1" value="1" style="width: 80px; height: 50px; text-align: center;"   onchange="calculateAmount()" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                
                <input id="amount" hidden type="text" value="{{ $item['amount'] }}">
                <input name="product_id" id="qty_id" hidden type="text" value="{{ $item['id'] }}" >

            </div>
    
        @endforeach
                            
                </div>
            </div>

            <input type="hidden" name="product_id" value={{$singleProduct['id']}}>
            
            <br><br>
            <!-- <input class="btn btn-primary" type="submit" value="Add Cart" style="color:white"> -->

            <button  type="submit" value="Add Cart">add to cart</button>

                            <!-- <button class="btn btn-primary me-3 AddToCartBtn float-start">add to cart</button> -->
                            
                        </form>
                    </div>   
                </div>
                        
            </div>  
        
        </div>    
    </div>     
</div>
</div>
</div>




@if(!$relatedProduct->isEmpty())


<section class="product_area related_products mb-47">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section_title">
    <h2>Related Products</h2>
</div>

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


<div class="row no-gutters">
           
    @foreach($relatedProduct as $product)                     


    <div class="col-lg-4 col-md-4 col-12 ">

        <div class="single_product">
            <div class="product_thumb" style="padding:10px">
                    <a href="{{ route('product_details',['id'=>$product['id']]) }}"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$product->image ) }}" alt=""></a>
                
                <!-- {{ asset('images/product_images/'.$product->image) }} -->
                
            </div>	
            <div class="product_content grid_content">
                <div class="product_name">
                    <h3><a class="related_product_name" href="{{ route('product_details',['id'=>$product['id']]) }}" id="pname" style="text-decoration: none; color:black; ">{{ Str::limit($product->title, 25) }}</a></h3>
                </div>
                
                    <div class="price_box">
                    <span class="current_price">₹ {{ $amount_ARR[$product->id] }}</span>
                </div>


                
            </div>
            
            
        </div>


    </div>
    
    @endforeach
                
    </div>
</div>
</div>       
</div>
</section> 

@endif         

       
     <!-- modal area end-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 
 
<!-- <script type='text/javascript'> 

function quantityPairSelect(qnt){
// var qty = document.getElementById('pricespan').value = qnt;
    var product_qty = document.getElementById("product_qty").value;
    $("#pricespan").text('₹ ' + product_qty * qnt);

}

$("#product_qty").bind('keyup mouseup', function () {
    var product_qty = document.getElementById("product_qty").value;
    var product_amt = document.getElementById("product_amt").value;
    $("#pricespan").text('₹ ' + product_amt * product_qty);
});  




</script> -->


<script type="text/javascript">
 

function calculateAmount(quantity){

    var amount              = document.getElementById('product_amount').value;
    var quantity            = document.getElementById('product_qty').value;

    var calculated_amount   = Math.round(quantity * amount);

    document.getElementById('pricespan').style.display = 'none';
    document.getElementById('pricespan_new').innerHTML = calculated_amount;

}   

</script>

@endsection