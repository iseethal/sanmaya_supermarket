@extends('frontend.master')
@section('main')

@include('frontend.body.header')

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    .btn.btn-info{  

        color: white;
        background-color: #EA000D;
        border: #EA000D;
      }

    .btn.btn-info:hover{
        color: white;
        background-color: black;
        border: black;
    }
    .linkcolor{
        color:black !important;
        text-decoration:none !important;
    }
    .linkcolor:hover{
        color:#EA000D !important;
    }
   
</style>




<?php 
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Frontend\CartController;


$cartcount=0;
if (Session::has('user')) {
    $cartcount= CartController::cartcount();
}

?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a style="text-decoration: none;" href="/">home</a></li>
                            <li>Shopping Cart</li>
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
    

    @if (count($cart) > 0)
        

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">  

            <form action="#"> 
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">


                                <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                            @php   $grandtotal = 0;  $i = 1;  @endphp

                            @foreach ($cart as $item)
                                
                                <tr>

                                    <td><a href="/delete/{{$item->id}}" onclick="myDelete(event)"><i class="fa fa-trash-o"></i></a></td>

                                    <td class="product_thumb">
                                        <!-- <a href="{{ route('product_details',['id'=>$item['product_id']]) }}"> -->
                                        <a href="{{ route('product_details',['id'=>$item['product_id']]) }}">
                                            <img src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$item->image ) }}" alt="">
                                        </a>
                                    </td>

                                    <td><a class="linkcolor" href="{{ route('product_details',['id'=>$item['product_id']]) }}">{{ $item->product_name }}</a></td>

                                    <td>₹ {{ $item->amount }}</td>

                                    <td>                                        
                                          
                                        <input name="cart_id_<?=$i?>" id="cart_id_<?=$i?>" type="hidden" value="{{ $item->id }}">
                                        <input name="amount_<?=$i?>" id="p_amount_<?=$i?>" type="hidden" value="{{ $item->amount }}">                                                                                
                                        <input name="quantity_<?=$i?>" id="quantity_<?=$i?>" type="number" min="0.5" max="100" step="0.1" value="{{ $item->quantity }}" style="width: 80px; height: 50px; text-align: center;"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"> <br><br>
                                        <button type="button" class="btn btn-info" onclick="cartupdate(<?=$i?>)" >Update</button>

                                    </td>

                                    <td>₹{{ round($item['amount'] * $item['quantity']) }} </td>
                                    
                                </tr>

                                    
                                @php    
                                $grandtotal += $item['amount'] * $item['quantity'] 
                                @endphp


                            @php $i ++; @endphp

                            @endforeach
                                

                            </tbody>
                        </table>  
                        


                        
                            </div>  
                                  
                        </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="coupon_area">
                    
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                   
                                  
                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount">₹ {{ $grandtotal }}</p>
                                   </div>

                                   <div class="checkout_btn">
                                       <a style="text-decoration: none; color:white" href="checkout">Proceed to Checkout</a>
                                   </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
        
            </form> 
        </div>     
    </div>
     <!--shopping cart area end -->
@else
<div class="container" style="margin-top: 25px;width: 40%;">
    <div class="container-fluid">
        <div class=" ">
            <div class="panel-body">
                <center>
                    <h5>Your shopping cart is empty </h5>
                    <a style="text-decoration: none;" href="{{ route('shop') }}">back to the shop page</a>
                </center>
            </div>
        </div>
    </div>
</div>


 @endif


<br><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript"></script>
<script type="text/javascript">
    
function cartupdate(rid){

    var id                = document.getElementById('cart_id_'+rid).value;
    var amount            = document.getElementById('p_amount_'+rid).value;
    var quantity          = document.getElementById('quantity_'+rid).value;
    var total_amount      = Math.round(quantity * amount);

    const formData = new FormData();
    formData.append('id', id);
    formData.append('quantity', quantity);
    formData.append('total_amount', total_amount);

    $.ajax({
       type:'POST',
       
       url:"{{ route('cartupdate') }}",
       data: formData,
       contentType: false,
       processData: false,
       success:function(data){

            $('.alert-success').html(data.success).fadeIn('slow');
            $('.alert-success').delay(3000).fadeOut('slow');
            window.location.reload();
       }
    });
}
</script>

<script>
        function myDelete(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log('urlToredirect');
        swal({
                title: `Do you want to Delete ?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
              window.location.href = urlToRedirect;
              }
            });
           }
      </script>

@endsection