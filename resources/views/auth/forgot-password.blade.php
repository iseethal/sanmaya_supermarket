@extends('frontend.master')
@section('main')

@include('frontend.body.header')

 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a style="text-decoration: none;"  href="/">home</a></li>
                            <li>Forgot Password</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
    @endif

    

    <!-- my account start  -->
    <section class="main_content_area">
        <div class="container">   
            <div class="account_dashboard">
                <div class="row">
                  
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <div class="card-body">

                      <div class="col-md-6 col-sm-6 sign-in">
	

	<h4 class="">Forgot Password</h4>
	<p class="">Forgot your Password? No Problem!</p>
	

    <form method="POST" action="{{ route('password.email') }}">
            @csrf

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input style="box-shadow:none;border-color:black" type="email" class="form-control unicase-form-control text-input" id="email" name="email":value="old('email')" required autofocus  >
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
		
        </div>
<br>
	  	<button type="submit" style="box-shadow:none;" class="btn-upper btn btn-danger checkout-page-button">Email Password Reset Link</button>
         
        </form>			
</div>					
</div>

                    </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>  
        </div>        	
    </section>			
    <!-- my account end   --> 


@endsection