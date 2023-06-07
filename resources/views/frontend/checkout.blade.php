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
                            <li><a style="text-decoration: none; " href="/">home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
      
    <!--Checkout page section-->
    <div class="Checkout_section mt-60">
       <div class="container">
       <form action="{{ url('store') }}" method="POST">
         {{ csrf_field() }}


            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                            <h3>Billing Details</h3>
                   

                            <div class="row">

                                <div class="col-lg-6 mb-20">
                                    <label>First Name </label>
                                    <input type="text" name="billing_firstname" id="billing_firstname" required class="form-controll billing_firstname"                        
                                    @auth  @if (Auth::user()->fname != null)  value="{{ Auth::user()->fname }}" @endif  @endauth > 
                                        
                                    
                                    <span id="fname_error" class="text-danger"></span> 
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name  </label>
                                    <input type="text" name="billing_lastname" id="billing_lastname" required class="form-controll billing_lastname" @auth  @if (Auth::user()->lname != null)  value="{{ Auth::user()->lname }}" @endif  @endauth > 
                                    <span id="lname_error" class="text-danger"></span> 
                               
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Email Address </label>
                                    <input type="text" name="billing_email" id="billing_email" required class="form-controll billing_email"@auth value="{{ Auth::user()->email }}" @endauth readonly>    
                                    <span id="email_error" class="text-danger"></span> 
                               
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone Number  </label>
                                    <input type="number" name="billing_phone" id="billing_phone" required class="form-controll billing_phone" @auth  @if (Auth::user()->phone != null)  value="{{ Auth::user()->phone }}" @endif  @endauth> 
                                    <span id="phone_error" class="text-danger"></span> 
                               
                                </div>
                                <div class="col-12 mb-20">
                                    <label> address </label>
                                    <input placeholder="House number and street name" type="text" name="billing_address1" id="billing_address1" required class="form-controll billing_address1" @auth  @if (Auth::user()->address1 != null)  value="{{ Auth::user()->address1 }}" @endif  @endauth>     
                                    <span id="address_error" class="text-danger"></span> 
                               
                                </div>
                                <div class="col-12 mb-20">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="billing_address2" id="billing_address2" required @auth  @if (Auth::user()->address2 != null)  value="{{ Auth::user()->address2 }}" @endif  @endauth>     
                                </div>
                                 <div class="col-lg-6 mb-20">
                                    <label>Town/City </label>
                                    <input type="text" placeholder="Town/City" name="billing_city" id="billing_city"  required class="form-controll billing_city" @auth  @if (Auth::user()->city != null)  value="{{ Auth::user()->city }}" @endif  @endauth>     
                                    <span id="city_error" class="text-danger"></span> 
                               
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>State </label>
                                    <input type="text" placeholder="State" name="billing_state" id="billing_state"  required class="form-controll billing_state" @auth  @if (Auth::user()->state != null)  value="{{ Auth::user()->state }}" @endif  @endauth> 
                                    <span id="state_error" class="text-danger"></span> 
                               
                                </div>
                                 <div class="col-lg-6 mb-20">
                                    <label>Zip Code  </label>
                                    <input type="number" placeholder="Zip Code" name="billing_zip_code"  id="billing_zip_code" required class="form-controll billing_zip_code" @auth  @if (Auth::user()->zip_code != null)  value="{{ Auth::user()->zip_code }}" @endif  @endauth> 
                                    <span id="zipcode_error" class="text-danger"></span> 
                             
                                </div>

                                <br>
                               
                                <div class="col-12 mb-20">
                                    <!-- <label class="righ_0" for="address" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-controls="collapseOne">Ship to a different address?</label> -->

                                    <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                      
                                    <div class="row">
                                            
                                            <div class="col-12 mb-20">
                                                <label>Shipping Name</label>
                                                <input type="text" placeholder="shipping_name" name="shipping_name" id="shipping_name"   > 
   
                                            </div>
                                            <div class="col-12 mb-20">
                                                    <label for="countru_name">country <span>*</span></label>
                                                <input type="text" placeholder="country" name="shipping_country" id="shipping_country"   >     
                                                    
                                            </div>

                                            <div class="col-12 mb-20">
                                                <label>Shipping address  <span>*</span></label>
                                                <input placeholder="House number and street name" type="text" name="shipping_address1" id="shipping_address1" >     
                                            </div>
                                            <div class="col-12 mb-20">
                                                <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="shipping_address2" id="shipping_address2"  >     
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <label>Town / City <span>*</span></label>
                                                <input type="text" placeholder="Town/City" name="shipping_town" id="shipping_town"  >     
   
                                            </div> 
                                             <div class="col-lg-6 mb-20">
                                                <label>State <span>*</span></label>
                                                <input type="text" placeholder="State" name="shipping_state" id="shipping_state" > 
    
                                            </div> 
                                            <div class="col-lg-6 mb-20">
                                                <label>Zip Code<span>*</span></label>
                                                <input type="number" placeholder="Zip Code" name="shipping_zipcode" id="shipping_zipcode"  > 


                                            </div> 
                                            <div class="col-lg-6 mb-20">
                                                <label>Phone<span>*</span></label>
                                                <input type="number" placeholder="Phone" name="phone" id="phone"  > 
 
                                            </div>
                                             
                                        </div>
                                    
                                </div>
                               
                                <br><br>
                                
                                <div class="col-12">
                                    <div class="order-notes">
			                             <h4 class="title">Additional information</h4>
                                         <label for="order_note">Order Notes</label>

                                        <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery." name="order_notes" id="order_notes"></textarea>
                                    </div>    
                                </div> 
                                </div>

                            </div>                           

                            
            <br><br>
             
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

                                    @foreach ($cart as $item )
                                        <tr>
                                            <td> {{ $item->product_name }} <strong> × {{ $item->quantity }}</strong></td>
                                            <td><b>₹{{ round($item['amount'] * $item['quantity']) }}</b></td>
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
                                            <td>₹ {{ round($grandtotal) }}  </td>
                                        </tr>
                                        
                                        <th> 
			                             <h4 class="title">Grand Total</h4>
                                                
                                            </th>
                                            <td><strong>₹ {{ round($grandtotal) }} </strong></td>
                                        </tr>
                                    </tfoot>
                                </table>     
                            </div>

                            <div class="payment_method">
							<h4 class="checkout-title">Payment Method</h4>
                            <input type="hidden" value="{{ $grandtotal }}" name="total">

                               <div class="panel-default">
                               <input type="radio" id="payment_check" name="payment_type" value="cash_on_delivery" class="custom-control-input cod" checked>
									<label for="payment_check">Cash on delivery</label>                                  
                                  
                                    
                                    </div>
                                </div> 
                               <!-- <div class="panel-default">
                               <input type="radio" id="payment_bank" checked name="payment_type" value="pay_now" class="custom-control-input razorpay">
								<label for="payment_bank"> Pay Now</label>
                                    
                                </div> -->
                                <button type="submit" class="btn btn-success w-100 " > Place Order </button>
                                <!-- <button type="submit" class="btn btn-primary w-100 mt-3 razorpay-btn">Pay with Razerpay</button> -->
                                   
                            </div> 
                              
                    </div>
                   
                </div> 
            </div> 
        </div> 

    </div>
    </form> 

    <!--Checkout page section end-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script type='text/javascript'>   

$(document).ready(function () {
    
    $('.razorpay-btn').click(function (e) { 
        e.preventDefault();
        
        var billing_firstname = $('.billing_firstname').val();
        var billing_lastname = $('.billing_lastname').val();
        var billing_email = $('.billing_email').val();
        var billing_phone = $('.billing_phone').val();
        var billing_address1 = $('.billing_address1').val();
        var billing_city = $('.billing_city').val();
        var billing_state = $('.billing_state').val();
        var billing_zip_code = $('.billing_zip_code').val();

        if(!billing_firstname){

            fname_error = "First name is required";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }
        else{

            fname_error = "";
            $('#fname_error').html('');
        }

         if(!billing_lastname){

            lname_error = "Last name is required";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }
        else{

            lname_error = "";
            $('#lname_error').html('');
        }

         if(!billing_email){

            email_error = "Email is required";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else{

            email_error = "";
            $('#email_error').html('');
        }

         if(!billing_phone){

            phone_error = "Phone is required";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else{

            phone_error = "";
            $('#phone_error').html('');
        }

         if(!billing_address1){

            address_error = "Address is required";
            $('#address_error').html('');
            $('#address_error').html(address_error);
        }
        else{

            address_error = "";
            $('#address_error').html('');
        }
         if(!billing_city){

            city_error = "city is required";
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }
        else{

            city_error = "";
            $('#city_error').html('');
        }

         if(!billing_state){

            state_error = "state is required";
            $('#state_error').html('');
            $('#state_error').html(state_error);
        }
        else{

            state_error = "";
            $('#state_error').html('');
        }

        if(!billing_zip_code){

            zipcode_error = "zipcode is required";
            $('#zipcode_error').html('');
            $('#zipcode_error').html(zipcode_error);
        }
        else{

            zipcode_error = "";
            $('#zipcode_error').html('');
        }

        if(fname_error != '' || lname_error !=''|| email_error !=''|| phone_error !=''|| address_error !=''|| city_error !=''|| state_error !=''|| zipcode_error !='' )
        {
            return false;
        }
        else
        {
            var data = {   

                'billing_firstname': billing_firstname,
                'billing_lastname' : billing_lastname,
                'billing_email': billing_email,
                'billing_phone' : billing_phone,
                'billing_address1' : billing_address1,
                'billing_address2': billing_address2,
                'billing_city': billing_city,
                'billing_state': billing_state,
                'billing_zip_code' : billing_zip_code,
                'order_notes': order_notes

            }

            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: "data",
                dataType: 'json',
                success: function (response) {
                    
                    alert(response.total);
                }
            });      
        }
        
    });
});

 </script>


@endsection