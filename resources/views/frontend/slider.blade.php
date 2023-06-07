<section class="slider_section mb-50">
        <div class="container-fluid">
            <div class="row no-gutters"> 
                <div class="col-12">
                    
                    <div class="slider_area slider_three owl-carousel">
                    @foreach ($slider as $row) 

                   <div class="single_slider d-flex align-items-center" data-bgimg="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/slider_images/'.$row->image ) }}">
                            <div class="slider_content slider_content_three content_position_center">
                                <h4>{{ $row->title }}</h4>
                                <!-- <h2>laptops <span>from $99</span> </h2> -->
                                <p>{{ $row->description }}</p>
                                <a href="{{ $row->link }}">shop now</a>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>   
        
    </section> 