@extends('frontend.master')
@section('main')
@include('frontend.body.header')


<?php 
use App\Models\OrderItem;
?>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a style="text-decoration: none; " href="/">home</a></li>
                            <li>My account</li>
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

    <!-- my account start  -->
    <div class="my-account-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
          
            <!-- My Account Tab Menu End -->
            <!-- My Account Tab Content Start -->
            <div class="col-lg-12 col-md-12">
              <div class="tab-content" id="myaccountContent">
                <!-- Single Tab Content Start -->
                <div class="tab-pane  active" id="orders" role="tabpanel">
                  <div class="myaccount-content">
                    <br><br>
                    <h4>YOUR ORDERS</h4>
                    <div class="myaccount-table table-responsive text-center">
                      <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                           <tr>
                              <th>No</th>
                              <th>Order Id</th>
                              <th>Date</th>
                              <th>Item</th>
                              <th>Total</th>
                              <th>Status</th>

                          </tr>
                        </thead>
                        
                        <tbody>

                        @php ($i = 1)   @endphp
                        @foreach ($orders as $item)

                            @php
                            $order_id    = $item->id; 
                            $order_items = OrderItem::where('order_id', $order_id)->get(); 

                            $status_is = $style = "";

                            if ( $item->order_status == 0) 
                            {
                                $status_is    = "Order Placed";
                                $style        = "style=color:red;";

                            }
                            elseif( $item->order_status == 1) 
                            {
                                $status_is    = "In Progress";
                                $style        = "style=color:green;";

                            }
                            else{

                                $status_is    = "Delivered";
                                $style        = "style=color:green;";
                            }    

                            $order_date = $item->order_date;                                                     
                            @endphp

                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $order_date }}</td>
                                
                                <td> 
                                    @foreach ($order_items as $item1)
                                        {{ $item1->product_name ."  ×  ". $item1->quantity ."  - ".$item1->qty_amount }} <br>
                                    @endforeach
                                </td>
                                
                                <td>{{ $item->total }}</td>
                                <td {{ $style  }}>{{ $status_is }}</td>                               
                            </tr>

                        @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Single Tab Content End -->
                
              </div>
            </div> <!-- My Account Tab Content End -->
          </div>
        </div>
      </div>
    </div>
  </div>			
    <!-- my account end   --> 

<br><br>
@endsection