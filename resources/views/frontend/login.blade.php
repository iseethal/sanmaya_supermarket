@extends('frontend.master')
@section('main')

@include('frontend.body.header')

<style>
    .linkcolor{
        color:black !important;
        text-decoration:none !important;
    }
    .linkcolor:hover{
        color:#EA000D !important;
    }
</style>


<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>



 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a style="text-decoration: none;" href="/">home</a></li>
                            <li>login</li>
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
        <div class="alert alert-warning alert-dismissible" style="max-width:926px;">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session()->get('message') }}
        </div>
       </center>
    @endif

 @if (Auth::user())

<section class="main_content_area">
<div class="container">   
<div class="account_dashboard">
<div class="row">

<div class="col-sm-12 col-md-9 col-lg-9">
    <!-- Tab panes -->
    <div class="tab-content dashboard_content">
        <div class="tab-pane fade show active" id="dashboard">
            <h3 class="text-center"><span class="text-danger">Hi.....</span><strong>{{ Auth::user()->name }}</strong>  Update Your Profile</h3>
            <div class="card-body">
    <form method="POST" action="{{ route('user.profile.store') }}" >
        @csrf
<div class="form-group">
<label class="info-title" for="exampleInputEmail2">Name <span></span></label>
<input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control unicase-form-control text-input" id="name"  required>	  	
</div>

<div class="form-group">
<label class="info-title" for="exampleInputEmail2">Email <span></span></label>
<input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control unicase-form-control text-input" id="email"  readonly>	  	
</div>

<br>



<div class="login_submit">

<a  href="changepassword">Change your password?</a>

<button type="submit" class="btn btn-danger">Update</button>


</div>
    </form>

</div>

        </div>
        
    </div>
</div>
</div>
</div>  
</div>        	
</section>	
     
 @else
     
    <!-- customer login start -->
    <div class="customer_login mt-60">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                            <p>   
                                <label>Email <span>*</span></label>
                                <input  id="email"  type="email" name="email">
                             </p>
                             <p>   
                                <label>Passwords <span>*</span></label>
                                <input type="password" id="password" name="password">
                              
                             </p>   
                            <div class="login_submit">
                               <a class="linkcolor" href="forgot-password">Lost your password?</a>
                                <!-- <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label> -->
                                <button type="submit">login</button>
                                
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form method="POST" action="{{ route('user.register') }}">
                          @csrf
                            <p>   
                                <label>Name  <span>*</span></label>
                                <input type="text" id="name"  name="name" >
                             </p>
                             <p>   
                                <label>Email  <span>*</span></label>
                                <input type="email" id="email"  name="email" >
                             </p>
                             <p>   
                                <label>Password <span>*</span></label>
                                <input type="password" id="password" type="password" name="password">
                             </p>
                             <p>   
                                <label>Confirm Password <span>*</span></label>
                                <input type="password" id="password_confirmation" type="password" name="password_confirmation">
                                
                             </p>
                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->
    @endif


@endsection