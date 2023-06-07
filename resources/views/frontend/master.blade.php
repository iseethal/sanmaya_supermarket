<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/pallas/pallas/index-7.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Aug 2022 11:20:53 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sanmay Supermarket </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image" href="assets/img/logo1.png">
    
    <!-- CSS 
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!--header area start-->
    
   
    
    <!--header area end-->
    
    <!--Offcanvas menu area start-->
    
    <div class="off_canvars_overlay">
                
    </div>
   
    <!--Offcanvas menu area end-->
<main>

@yield('main')
   
</main>

   
    
    <!--brand newsletter area start-->
     
    @include('frontend.body.brands')
    
    <!--brand area end-->
    
    
    
      <!--footer area start-->
   
      @include('frontend.body.footer')

    <!--footer area end-->
   
   
   <!-- modal area start-->
   

     <!-- modal area end-->
    


    
    

<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" ></script>



</body>


<!-- Mirrored from htmldemo.net/pallas/pallas/index-7.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Aug 2022 11:21:15 GMT -->
</html>