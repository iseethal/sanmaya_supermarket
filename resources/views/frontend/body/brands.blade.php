<div class="brand_newsletter_area mb-50">
        <div class="container">
                
            <div class="row">
                <div class="col-12">
                   
                    <div class="brand_container owl-carousel">
             @foreach ($brands as $brand)

                        <div class="single_brand">
                            <a href="#"><img src="{{ url('https://supermarket.gisaxiom.com/public/assets/images/brand_images/'.$brand->image ) }}" alt=""></a>
                        </div>
            @endforeach
                       
                    </div>  

                   
                </div>
            </div>


        </div>
    </div> 