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
       <form action="{{ url('/cod') }}" method="POST">
       @csrf
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                                  

                        @if (Auth::user()->shipping_address1)
                            
                        <h3>Bill To</h3>
    

                   <div class="row">

                   <p>{{ Auth::user()->fname }}  {{ Auth::user()->lname }}</p>
                                <p>{{ Auth::user()->email }} </p>
                                <p>{{ Auth::user()->phone }} </p>
                                <p>{{ Auth::user()->address1 }} </p>
                                <p>{{ Auth::user()->address2 }} </p>
                                <p>{{ Auth::user()->city }} ,{{ Auth::user()->state }} ,{{ Auth::user()->zip_code }}</p>
                                 
                      
                                                                          
                   </div>

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

    <h3>Bill To</h3>

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
                                    <button  type="submit" float="right" >Place Order</button> 
                                </div> 
                              

                            </div> 
                              
                    </div>
                   
                </div> 
            </div> 
        </div> 

    </div>
    </form> 

    <!--Checkout page section end-->


@endsection