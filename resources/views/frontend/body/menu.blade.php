<?php
use App\Models\Cart;

?>
<!--Offcanvas menu area start-->
    
<div class="off_canvars_overlay">
                
                </div>
                <div class="Offcanvas_menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="canvas_open">
                                    <span>MENU</span>
                                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                                </div>
                                <div class="Offcanvas_menu_wrapper">
                                    <div class="canvas_close">
                                          <a href="javascript:void(0)"><i class="ion-android-close"></i></a>  
                                    </div>
                                    <div class="welcome_text">
                                       <p>Welcome to <span>Sanmay Supermarket</span> </p>
                                   </div>
                                   
                                    <div class="top_right">
                                    <ul>
                                        
                                        @auth
                                        
                                        <li class="top_links"><i class="zmdi zmdi-account"></i> {{ Auth::user()->name }} <i class="zmdi zmdi-caret-down"></i>
                                        <ul class="dropdown_links">
                                            <!-- <li><a href="checkout">Checkout </a></li> -->
                                            <li><a href="my-account">My Account </a></li>
                                            <li><a href="logout">Logout</a></li>
                                            @else
                                            <li><a href="login">Login/Register </a></li>
                                            
                                        </ul>
                                    </li>
                                    @endauth
                                    
                                    
                                    
                                </ul>
                                    </div> 
                                    <div class="search-container">
                                       <form action="{{route('search')}}" method="get" role="search">
                                            @csrf
                                           
                                            <div class="search_box">
                                                <input name="query" placeholder="Search product..." type="text" required>
                                                <button type="submit"><i class="zmdi zmdi-search"></i></button> 
                                            </div>
                                        </form>
                                    </div> 
                                @php
            
                                $cartcount = Cart::where('user_id', Auth::id())->count();
            
                                @endphp
                                    
                                          
            
                                @if ($cartcount > 0)                       
                                           
                                    @include('frontend.minicart')
            
                                @endif
                                    <div id="menu" class="text-left ">
                                         <ul class="offcanvas_main_menu">
                                            <li class="menu-item-has-children active">
                                                <a style="text-decoration: none; " href="/">Home</a>
                                               
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a style="text-decoration: none; " href="shop">Shop</a>
                                                
                                            </li>
                                            <!-- <li class="menu-item-has-children">
                                                <a href="#">blog</a>
                                                <ul class="sub-menu">
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="blog-details.html">blog details</a></li>
                                                    <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                    <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                </ul>
            
                                            </li> -->
                                            
                                            <li class="menu-item-has-children">
                                                <a style="text-decoration: none; " href="my-account">my account</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a style="text-decoration: none; " href="about">about Us</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a style="text-decoration: none; " href="contact"> Contact Us</a> 
                                            </li>
                                        </ul>
                                    </div>
            
                                    <!-- <div class="Offcanvas_footer">
                                        <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Offcanvas menu area end-->