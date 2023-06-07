<?php 
use App\Models\Cart;

?>

<style>
     .linkcolor{
        color:black !important;
        text-decoration:none !important;
    }
    .linkcolor:hover{
        color:#EA000D !important;
    }
</style>


<header class="header_area header_seven">
        <!--header top start-->
        <div class="header_top header_top_seven">
            <div class="container">  
                <div class="row align-items-center">
                    <div class="col-lg-4">
                       <div class="welcome_text">
                           <p>Welcome to <span> Sanmay Supermarket</span> </p>
                       </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="top_right text-right">
                        
                        <ul>
                     
                        @auth
                  
                  <li class="top_links"><a style="text-decoration: none; "  href="{{ route('login') }}"><i class="zmdi zmdi-account"></i> {{ Auth::user()->name }} <i class="zmdi zmdi-caret-down"></i></a>
                      <ul class="dropdown_links">
                          <!-- <li><a href="checkout">Checkout </a></li> -->
                          <li><a class="linkcolor" href="my-account">My Account </a></li>
                          <li><a class="linkcolor" href="logout">Logout</a></li>
                        @else
                        <li><a style="text-decoration: none;" href="login">Login/Register </a></li> 

                                            </ul>
                                        </li>
                        @endauth                  
                  
                  
                      </ul>
                        </div> 
                    </div>
                    
                </div>
            </div>
        </div>
        <!--header top start-->
        <!--header center area start-->
        <div class="header_middle header_middle_seven">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="/"><img style="width: 40%; height: 40%;" src="assets/img/logo/logo-sanmay.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="header_middle_inner">
                            <div class="search-container">
                            <form action="search">                                   
                                   <div class="search_box">
                                       <input name="query" placeholder="Search product..." type="text" class="form-control search-box">
                                       <button type="submit"><i class="zmdi zmdi-search"></i></button> 
                                   </div>
                               </form>
                            </div>


@php

$cartcount = Cart::where('user_id', Auth::id())->count();

@endphp
                            
                                <!--mini cart-->

                    @if ($cartcount > 0)                       
                               
                        @include('frontend.minicart')

                    @endif
                        
                                <!--mini cart end-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header center area end-->
        
        <!--header middel start-->
        <div class="header_bottom header_bottom_seven">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="categories_menu categori_seven">
                        <div class="categories_title">
                            <h2 class="categori_toggle">Categories</h2>
                        </div>
                        <div class="categories_menu_toggle">
                            <ul> 
                          
                                 
                            @foreach($categories as $category)
                            <li> 
                         <a href="{{ route('shop',['id'=>$category['id']]) }}">{{ $category['title'] }} <span></span> </a> 
                                </li>
                               
                            @endforeach
                        
                        </ul>
                        </div>
                        </div>
                   </div>
                    <div class="col-lg-9">
                        <div class="main_menu menu_seven header_position"> 
                            <nav>  
                                <ul>

                                    <li class="active" style="text-decoration: none;"><a  href="/" ><i class="zmdi zmdi-home"></i> home </a>
                                       
                                    </li>
                                    <li class="mega_items"><a href="/shop" style="text-decoration: none;"><i class="zmdi zmdi-shopping-basket"></i> shop </a> </li>                                   
                                                                            
                                    
                                    <!-- <li><a href="blog"><i class="zmdi zmdi-collection-music"></i> blog </a>
                                        
                                    </li> -->
                                  
                                    <!-- <li><a href="testimonials"><i class="zmdi zmdi-comments"></i> Testimonials</a></li> -->

                                    <li><a href="about" style="text-decoration: none;"><i class="zmdi zmdi-comments"></i> about Us</a></li>
                                    <li><a href="contact" style="text-decoration: none;"><i class="zmdi zmdi-account-box-mail"></i>  Contact Us</a></li>
                                </ul>  
                            </nav> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->
     
    </header>

    @include('frontend.body.menu')