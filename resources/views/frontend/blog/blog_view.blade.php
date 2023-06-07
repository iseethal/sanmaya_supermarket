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
                            <li>blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

     <!--blog area start-->
     <div class="main_blog_area mt-50 mb-50">
	        <div class="container">
	            <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="blog_left_area">

                        @foreach ($blog_details as $item)
                            

                            <div class="single_blog mb-50">   
                                <div class="blog_title">
                                    <span>
                                        <a href="#">{{ $item->meta_keywords }}</a>
                                    </span>
                                    <h2><a href="#">{{ $item->short_name }}</a></h2>
                                    <div class="blog_post">
                                        <ul>
                                            <li class="post_author">Posts by : admin</li>
                                            <li class="post_date"> {{ $item->created_at }}	</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog_container">
                                    <div class="blog_thumb">
                                        <a href="{{ route('blogdetails',['id'=>$item['id']]) }}"><img src="{{ url('https://supermarket.gisaxiom.com/public/assets/images/blog_images/'.$item->image ) }}" alt=""></a>
                                    </div>

                                    <h4>{{ $item->title }}</h4>
                                        <p class="blog_desc"></p>
                                        
                                        <a href="{{ route('blogdetails',['id'=>$item['id']]) }}"><b>READ MORE</b></a>
                                        <div class="blog_footer">
                                            
                                            <div class="blog_social" >
                                                
                                                <p>Share this post</p>
                                                <ul >
                                                    <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#" title="Facebook"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#" title="Facebook"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#" title="Facebook"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#" title="Facebook"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                            <!-- <div class="blog_comment">
                                                <a href="#">3 comments</a>
                                            </div> -->
                                        </div>
                                </div>
                            </div>

                         @endforeach

                            
                            
                          
                        
	                    </div>
	                    <!--blog pagination area start-->
                        <div class="blog_pagination">

                        {{$blog_details->links()}}

                        </div>
                        <!--blog pagination area end-->
                    </div>
                    <div class="col-lg-3 col-md-8 offset-md-2 offset-lg-0">

                    <div class="blog_sidebar_widget">
                           
                            <div class="widget_list recent_post">
                                <h2>Categories</h2>
                                <ul>
                                    @foreach ($blogs as $item)
                                        
                                    <li>
                                        <a href="#">{{ $item->name}}</a> 
                                    </li>                                   
                                    
                                    @endforeach

                                </ul>
                            </div>
                       
                       <div class="blog_sidebar_widget">
                           
                            <div class="widget_list recent_post">
                                <h2>Recent Posts</h2>
                                <ul>

                                @foreach ($details as $item)
                                    
                                <li>
                                        <a href="#">{{ $item->short_name }}</a> 
                                    </li>
                                    
                                 @endforeach

                                </ul>
                            </div>
                           
                           
                             <div class="widget_list widget_tags">
                                <h2>Tags</h2>
                                <div class="tag_cloud">
                                    <ul>
                                    @foreach ($blog_details as $item)

                                    <li><a href="#">{{ $item->meta_keywords }}</a></li>
        
                                    @endforeach
                                    
                                       
                                    </ul>
                                </div>
                            </div>

                       </div>
                    </div>
	            </div>
	        </div>
	    </div>
    <!--blog area end-->


@endsection