@extends('frontend.master')
@section('main')

@include('frontend.body.header')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
    @endif
      
    <!--Checkout page section-->
    <div class="Checkout_section mt-60">
       <div class="container">
       <form action="{{ url('/make-payment') }}" method="POST">
       @csrf


            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                        @if (Auth::user()->shipping_address1)
   
                        <h3>Bill To</h3>
    

                   <div class="row">
                   @foreach ($orders as $item)                       

                   <p>{{ $item->billing_firstname }}  {{ $item->billing_lastname }}</p>
                                <p>{{ $item->billing_email }} </p>
                                <p>{{ $item->billing_phone }} </p>
                                <p>{{ $item->billing_address1 }} </p>
                                <p>{{ $item->billing_address2 }} </p>
                                <p>{{ $item->billing_city }} ,{{ $item->billing_state }} ,{{ $item->billing_zip_code }}</p>
                                                                          
                   </div>
                   @endforeach


                            <h3>Ship To</h3>                  
                
                            <div class="row">
                         @foreach ($orders as $item)                       

                        <p>{{ $item->shipping_name }} </p>
                            <p>{{ $item->shipping_country }} </p>
                            <p>{{ $item->shipping_address1 }} {{ $item->shipping_address2 }} </p>
                            <p>{{ $item->shipping_town }} {{ $item->shipping_state }} {{ $item->shipping_zipcode }}</p>
                            <p>{{ $item->phone }} </p>
                           
                           
                            @endforeach
                             
                                   	    	    	    	    	    	    
                            </div>
                
                          
                            
    @else

    <h3>Bill and ship To</h3>

    <div class="row">

<p>{{ Auth::user()->fname }}  {{ Auth::user()->lname }}</p>
             <p>{{ Auth::user()->email }} </p>
             <p>{{ Auth::user()->phone }} </p>
             <p>{{ Auth::user()->address1 }} </p>
             <p>{{ Auth::user()->address2 }} </p>
             <p>{{ Auth::user()->city }} ,{{ Auth::user()->state }} ,{{ Auth::user()->zip_code }}</p>
              
   
                                                       
</div>


                   @endif
                   
                    </div>

                    <div class="col-lg-6 col-md-6">
                          
                            <h3>Your order</h3> 
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php   $grandtotal = 0    @endphp

                            @foreach ($cart as $item)
                                   
                                        <tr>
                                            <td> {{ $item->product_name }} <strong> × {{ $item->quantity }}</strong></td>
                                            <td><b>₹{{ $item['amount']  }}</b></td>
                                        </tr>

                                    @php
    
                                    $grandtotal += $item['amount'] * $item['quantity']

                                    @endphp

                                    @endforeach

                                    </tbody>
                                   <tfoot>
                                        <tr>
                                            <th> 
			                             <h4 class="title">Sub Total</h4>
                                                
                                            </th>
                                            <td>₹ {{ $grandtotal }} </td>
                                        </tr>
                                        
                                        <th> 
			                             <h4 class="title">Grand Total</h4>
                                                
                                            </th>
                                            <td><strong>₹ {{ $grandtotal }}</strong></td>


                                        </tr>
                                    </tfoot>
                                </table>     
                            </div>

                            <div class="payment_method">                           
                                                             
                                <div class="order_button">
                                    <button  type="submit" float="right" name="payment_type" value="paynow" id="rzp-button1">paynow</button> 
                                </div> 

                            </div>
                    </div>
                   
                </div> 
            </div> 
        </div> 

    </div>
    </form> 

    <!--Checkout page section end-->

  

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var urls= "{{ route('success') }}"
var options = {
    "key": "rzp_test_APvrNv6aeKU8tq", // Enter the Key ID generated from the Dashboard
    "amount": "{{ $razorpayOrder->amount }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "GIS Axiom",
    "description": "Supermarket",
    "image": "https://www.gisaxiom.com/assets/images/logo-dark.png",
    "order_id": "{{ $razorpayOrder->id }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
   
    "handler": function (response){

        console.log();

        window.location.href = urls+'?payment_id='+response.razorpay_payment_id;    
    },

    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "prefill": {
        "name": "{{ Auth::user()->name }}",
        "email": "{{ Auth::user()->email }}",
        "contact" : "{{ Auth::user()->phone }}"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

@endsection