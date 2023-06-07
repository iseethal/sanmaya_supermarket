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
                            <li><a href="/">home</a></li>
                            <li>Change Password</li>
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

                        <form method="POST" action="{{ url('storepassword') }}">
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif



           <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Old Password <span></span></label>
	    	<input name="oldpassword" type="password"   id="oldpassword"  class="form-control unicase-form-control text-input"  >	  	
                             @error('oldpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
             </div>
             

             <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">New Password <span></span></label>
	    	<input name="newpassword" type="password"  id="newpassword"  class="form-control unicase-form-control text-input"  >	  	
                             @error('newpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror       
               
             </div>

             <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Confirm Password <span></span></label>
	    	<input name="confirm_password" type="password"   id="confirm_password" class="form-control unicase-form-control text-input"  >	  	
                          @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
             </div>
            
            <br>
            <div class="form-group">
                <button type="submit" value="Change Password" class="btn btn-danger">Update</button>
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
    <!-- my account end   --> 


@endsection