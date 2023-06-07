
<style>
    .mini_cart_footer{
        font-size:12px;
    }
    .linkcolor{
        color:black !important;
        text-decoration:none !important;
    }
    .linkcolor:hover{
        color:#EA000D !important;
    }
</style>

<div class="mini_cart_wrapper">
<a style="text-decoration: none;" href="javascript:void(0)">Cart
<span class="badge badge-pill bg-success cart-count"></span>
<!-- <i class="zmdi zmdi-shopping-basket"></i> <span>2items - $213.00</span> </a> -->
<!--mini cart-->

<div class="mini_cart mini_cart_seven">

@php   $grandtotal = 0    @endphp

@foreach ($cart as $item )

<div class="cart_item">
    <div class="cart_img">
<a href="{{ route('product_details',['id'=>$item['product_id']]) }}"><img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$item->image ) }}" alt=""></a>

    </div>
    <div class="cart_info">
        <a class="linkcolor"  href="{{ route('product_details',['id'=>$item['product_id']]) }}">{{ Str::limit($item->product_name, 25) }}</a>

        <span class="quantity">{{ $item->quantity }} ×  <b>{{ $item->amount }}</b></span>

    </div>
   
</div>

 @php
    
 $grandtotal += $item['amount'] * $item['quantity'] 

 @endphp
 @endforeach

    <div class="mini_cart_table">
        <div class="cart_total">
            <span>Subtotal:</span>
            <span class="price">₹ {{ round($grandtotal) }} </span>
        </div>
    </div>

    <div class="mini_cart_footer">
        <div class="cart_button">
            <a href="cart" style="text-decoration: none; color:white">View cart</a>
            <a href="checkout" style="text-decoration: none; color:white">Checkout</a>
        </div>
    </div>

</div>
<!--mini cart end-->
</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script type='text/javascript'>   

$(document).ready(function () {

    loadcart();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 

    function loadcart()
    {
        $.ajax({

            method: "GET",
            url: "/load-cart-data",
           
            success: function (response) {


                $('.cart-count').html('');
                $('.cart-count').html(response.count);

                console.log(response.count);
                
            }
        });
    }

});


 </script>