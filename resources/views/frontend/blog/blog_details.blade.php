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
                            
                            <li>blog details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

     <!--blog body area start-->
     <div class="blog_details mt-50 mb-50">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->

                        
                    <div class="blog_details_wrapper">
                        <div class="single_blog mb-50">
                            <div class="blog_title">
                            <span>
                                <a href="#">{{ $blog_details->meta_keywords }}</a>
                            </span>

                            <h2><a href="#">{{ $blog_details->short_name }}</a></h2>
                            <div class="blog_post">
                                <ul>
                                    <li class="post_author">Posts by : admin</li>
                                    <li class="post_date"> {{ $blog_details->created_at }}	</li>
                                </ul>
                            </div>
                        </div>
                            <div class="blog_thumb">
                           <a href="#"><img src="{{ url('https://supermarket.gisaxiom.com/public/assets/images/blog_images/'.$blog_details->image ) }}" alt=""></a>
                       </div>
                            <div class="blog_content">
                                <div class="post_content">
                                <h4>{{ $blog_details->title }}</h4>

                                    <p>{!! $blog_details->description !!}</p>
                                    </div>
                                <div class="entry_content">
                                    <div class="post_meta">
                                        <span>Tags: </span>
                                        <span><a href="#">, {{ $blog_details->meta_keywords }}</a></span>
                                       
                                    </div>

                                    <div class="social_sharing">
                                        <p>share this post:</p>
                                        <ul>
                                            <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                           </div>
                            <div class="related_posts">
                           <h3>Related posts</h3>
                           

                            <div class="row">

                            @foreach ($related_blogs as $item)
                                
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_related">
                                        <div class="related_thumb">
                           <a href="{{ route('blogdetails',['id'=>$item['id']]) }}"><img src="{{ url('https://supermarket.gisaxiom.com/public/assets/images/blog_images/'.$item->image ) }}" alt=""></a>

                                        </div>
                                        <div class="related_content">
                                           <h4><a href="#">{{ $item->short_name }}</a></h4>
                                           <span><i class="fa fa-calendar" aria-hidden="true"></i> {{ $item->created_at }} </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>

                       </div> 
                        </div>
                           
                         
                    </div>


                    <!--blog grid area start-->
                </div>
                <div class="col-lg-3 col-md-12">
                     <div class="blog_sidebar_widget">
                        
                        
                        <div class="widget_list recent_post">
                            <h2>Recent Posts</h2>
                            <ul>
                            @foreach ($blogs as $item)
                                        
                                        <li>
                                            <a href="#">{{ $item->name}}</a> 
                                        </li>                                   
                                        
                             @endforeach

                            </ul>
                        </div>
                        
                        <div class="widget_list widget_tags">
                            <h2>Tags</h2>
                            <div class="tag_cloud">
                                <ul>

                                @foreach ($details as $item )
                                    
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
    <!--blog section area end-->


@endsection