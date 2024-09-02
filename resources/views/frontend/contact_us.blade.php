@extends('frontend.master')
@section('main')
@include('frontend.body.header')



<!--breadcrumbs area start-->
<div class="breadcrumbs_area" style="margin-bottom:30px;">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a style="text-decoration: none;" href="/">home</a></li>
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

     <!--contact map start-->
     <div class="box-layout-map-area mb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  box layout map container  =======-->

					<div class="box-layout-map-container">
						<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d15727.905204425377!2d76.30134454824103!3d9.768072440523389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOcKwNDYnMDUuOCJOIDc2wrAxOCcyMi41IkU!5e0!3m2!1sen!2sin!4v1676879716259!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>

					<!--=======  End of box layout map container  =======-->
				</div>
			</div>
		</div>
	</div>
    <!--contact map end-->

    <!--contact area start-->

    <br><br>
    <div class="contact_area">
        <div class="container">   
            <div class="row">
                <div class="col-lg-12 col-md-12">
                   <div class="contact_message content">
                        <h3>contact us</h3>    
                         <p>Supermarket/ Convenience store</p>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Address : South of TD Temple, Thuravoor, India, Kerala.</li>
                            <li><i class="fa fa-phone"></i> <a href="#"> +91 7907503299</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="mailto:sanmaymart@gmail.com">sanmaymart@gmail.com</a>  </li>
                        </ul>             
                    </div> 
                </div>
                <!-- <div class="col-lg-6 col-md-12">
                   <div class="contact_message form">
                        <h3>Tell us your project</h3>   
                        <form id="contact-form" method="POST"  action="https://htmldemo.net/pallas/pallas/assets/mail.php">
                            <p>  
                               <label> Your Name (required)</label>
                                <input name="name" placeholder="Name *" type="text" required> 
                            </p>
                            <p>       
                               <label>  Your Email (required)</label>
                                <input name="email" placeholder="Email *" type="email" required>
                            </p>
                            <p>          
                               <label>  Subject</label>
                                <input name="subject" placeholder="Subject *" type="text" required>
                            </p>    
                            <div class="contact_textarea">
                                <label>  Your Message</label>
                                <textarea placeholder="Message *" name="message"  class="form-control2" required></textarea>     
                            </div>   
                            <button type="submit"> Send</button>  
                            <p class="form-messege"></p>
                        </form> 

                    </div> 
                </div> -->
            </div>
        </div>    
    </div>

    <!--contact area end-->

<!--map js code here-->



@endsection