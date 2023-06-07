<?php 
use App\Models\Order;
?>
<head>
<!--[if gte mso 15]>
<xml>
<o:OfficeDocumentSettings>
<o:AllowPNG />
  <o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml>
<![endif]-->
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Order confirmation email template for Shopify -->
<style type="text/css" data-premailer="ignore">
/* What it does: Remove spaces around the email design added by some email clients. */
/* Beware: It can remove the padding / Margin and add a background color to the compose a reply window. */
html, body {
  Margin: 0 auto !important;
  padding: 0 !important;
  width: 100% !important;
    height: 100% !important;
}
/* What it does: Stops email clients resizing small text. */
* {
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
/* What it does: Forces Outlook.com to display emails full width. */
.ExternalClass {
  width: 100%;
}
/* What is does: Centers email on Android 4.4 */
div[style*="Margin: 16px 0"] {
    Margin:0 !important;
}
/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
th {
  mso-table-lspace: 0pt;
  mso-table-rspace: 0pt;
}
/* What it does: Fixes Outlook.com line height. */
.ExternalClass,
.ExternalClass * {
  line-height: 100% !important;
}
/* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
table {
  border-spacing: 0 !important;
  border-collapse: collapse !important;
  border: none;
  Margin: 0 auto;
}
div[style*="Margin: 16px 0"] {
    Margin:0 !important;
}
/* What it does: Uses a better rendering method when resizing images in IE. */
img {
  -ms-interpolation-mode:bicubic;
}
/* What it does: Overrides styles added when Yahoo's auto-senses a link. */
.yshortcuts a {
  border-bottom: none !important;
}
/* What it does: Overrides blue, underlined link auto-detected by iOS Mail. */
/* Create a class for every link style needed; this template needs only one for the link in the footer. */
/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.x-gmail-data-detectors,    /* Gmail */
.x-gmail-data-detectors *,
.aBn {
    border-bottom: none !important;
    cursor: default !important;
    /* color: inherit !important; */
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}
/* If the above doesn't work, add a .g-img class to any image in question. */
img.g-img + div {
    display:none !important;
}
/* What it does: Prevents underlining the button text in Windows 10 */
a,
a:link,

/* What it does: Overrides styles added images. */
img {
  border: none !important;
  outline: none !important;
  text-decoration:none !important;
}
/* What it does: Fixes fonts for Google WebFonts; */
[style*="Karla"] {
    font-family: 'Karla',-apple-system,BlinkMacSystemFont,'Segoe UI',Arial,sans-serif !important;
}
[style*="Karla"] {
    font-family: 'Karla',-apple-system,BlinkMacSystemFont,'Segoe UI',Arial,sans-serif !important;
}
[style*="Karla"] {
    font-family: 'Karla',-apple-system,BlinkMacSystemFont,'Segoe UI',Arial,sans-serif !important;
}
[style*="Playfair Display"] {
    font-family: 'Playfair Display',Georgia,serif !important;
}
td.menu_bar_1 a:hover,
td.menu_bar_6 a:hover {
  color: #ecba78 !important;
}
th.related_product_wrapper.first {
  border-right: 13px solid #ffffff;
  padding-right: 6px;
}
th.related_product_wrapper.last {
  border-left: 13px solid #ffffff;
  padding-left: 6px;
}
</style>


</head>
<body class="body" id="body" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"  style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;">

<table class="container container_full" cellpadding="0" cellspacing="0" border="0" width="100%" >
<tbody>
  <tr>
    <th valign="top" style="mso-line-height-rule: exactly;">
      <center style="width: 100%;">
        <table border="0" width="600" cellpadding="0" cellspacing="0" align="center" style="width: 600px; min-width: 600px; max-width: 600px; margin: auto;" class="email-container" role="presentation">
          <tbody><tr>
            <th valign="top" style="mso-line-height-rule: exactly;">
              <!-- BEGIN : SECTION : HEADER -->
              <table class="section_wrapper header" data-id="header" id="section-header" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                <tbody><tr>
                  <td class="section_wrapper_th" style="mso-line-height-rule: exactly; padding-top: 52px; padding-bottom: 26px;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                      <tbody><tr>
                        <!-- <th class="column_logo" style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px;" align="center" bgcolor="#ffffff">
                          
                        
                            <img src="assets/img/logo/logo-sanmay2.png" class="logo " width="96" border="0" style="width: 96px; height: auto !important; display: block; text-align: center; margin: auto;">
                          </a>
                          
                        </th> -->
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
              </tbody></table>
              <!-- END : SECTION : HEADER -->
              <!-- BEGIN : SECTION : MAIN -->
              <table class="section_wrapper main" data-id="main" id="section-main" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                <tbody><tr>
                  <td class="section_wrapper_th" style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" id="mixContainer" role="presentation">
                      <!-- BEGIN SECTION: Heading -->
                      <tbody><tr id="section-1468266" class="section heading">
                        <th style="mso-line-height-rule: exactly; color: #4b4b4b; padding: 26px 52px 13px;" bgcolor="#ffffff">
                          <table cellspacing="0" cellpadding="0" border="0" width="100%" role="presentation" style="color: #4b4b4b;" bgcolor="#ffffff">
                            <tbody><tr style="color: #4b4b4b;" bgcolor="#ffffff">
                              <th style="mso-line-height-rule: exactly; color: #4b4b4b;" bgcolor="#ffffff" valign="top">
                                <h1 data-key="1468266_heading" style="font-family: Georgia,serif,'Playfair Display'; font-size: 28px; line-height: 46px; font-weight: 700; color: #4b4b4b; text-transform: none; background-color: #ffffff; margin: 0;">Order Confirmation</h1>
                              </th>
                            </tr>
                          </tbody></table>
                        </th>
                      </tr>
                      
                     

                      @php

                      $orders = Order::where('user_id', Auth::id())->latest()->limit(1)->get(); 

                      @endphp
                     
                      </tr>
                      @php  $currentdate  = Carbon\Carbon::now('Asia/Kolkata')->format('d-m-Y'); @endphp
                        <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                          <h2 style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; color: #4b4b4b; font-size: 20px; line-height: 26px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;" align="center">
                            <span data-key="1468270_order_number">Order No.</span> @foreach ($orders as $item)    {{ $item->id }}  @endforeach
                          </h2>
                          <p class="muted" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 14px; line-height: 26px; font-weight: normal; color: #bdbdbd; margin: 0;" align="center"> {{ $currentdate }} </p>
                        </th>
                      </tr>
                      <!-- END SECTION: Order Number And Date -->
                      <!-- BEGIN SECTION: Products With Pricing -->
                      <tr id="section-1468271" class="section products_with_pricing">
                        
                          <!-- Bold 1 -->
                          
                          
                          
                          <!-- end Bold 1 -->
                          <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                            <table class="table-inner" cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                              <tbody><tr>
                                <th class="product-table" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                                  <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                                    <tbody><tr>
                                      <th colspan="2" class="product-table-h3-wrapper" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                                        <h3 data-key="1468271_item" style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; letter-spacing: 1px; margin: 0;" align="left">Items ordered</h3>
                                      </th>
                                    </tr>
                                    @php   $grandtotal = 0    @endphp

                                      @foreach ($cart as $item )

                                      <tr class="row-border-bottom">

                                        <th class="table-stack product-image-wrapper stack-column-center" width="1" style="mso-line-height-rule: exactly; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; padding: 13px 13px 13px 0;" bgcolor="#ffffff" valign="middle">
                                        
<img width="140" class="product-image" src="{{ url('https://admin.sanmaysupermarket.com/public/assets/images/product_images/'.$item->image ) }}" alt="Product Image" style="vertical-align: middle; text-align: center; width: 140px; max-width: 140px; height: auto !important; border-radius: 1px; padding: 0px;">
                                          </th>
                                        <th class="product-details-wrapper table-stack stack-column" style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;" bgcolor="#ffffff" valign="middle">
                                          <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                                            <tbody><tr>
                                              <th class="line-item-description" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 12px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 6px 13px 0;" align="left" bgcolor="#ffffff" valign="top">
                                                <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left">
                                                  
                                                  {{ $item->product_name }}
                                                  </a>
                                                  <br>
                                                  
                                                </th>
                                                
                                                  <th style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top"></th>
                                                
                                                <th class="right line-item-qty" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 13px;" align="right" bgcolor="#ffffff" valign="top">
                                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                                  {{ $item->quantity }}  ×&nbsp; 
                                                  </p>
                                                </th>
                                                <th class="right line-item-line-price" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 26px;" align="right" bgcolor="#ffffff" valign="top">
                                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                                  ₹ {{ $item->amount }}
                                                  </p>
                                                </th>

                                                <th class="right line-item-line-price" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 26px;" align="right" bgcolor="#ffffff" valign="top">
                                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                                    ₹ {{ $item['amount'] * $item['quantity'] }} 
                                                  </p>
                                                </th>
                                                <br>
                                              </tr>

                                            </tbody></table>
                                          </th>
                                        </tr>

                                        @php
                                            $grandtotal += $item['amount'] * $item['quantity'] 
                                        @endphp

                                        @endforeach
                                        
                                        
                                      
                                    </tbody></table>
                                  </th>
                                </tr>
                                <tr>
                                  <th class="pricing-table" style="mso-line-height-rule: exactly; padding: 13px 0;" bgcolor="#ffffff" valign="top">
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                                      
                                        <tbody>
                                        
                                        <tr>
                                          <th class="table-title" data-key="1468271_subtotal" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px;  color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">Subtotal</th>
                                          <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">₹ {{ $grandtotal }} </th>
                                        </tr>
                                        <tr>
                                          <th class="table-title" data-key="1468271_subtotal" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">Grand Total</th>
                                          <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">₹ {{ $grandtotal }} </th>
                                        </tr>
                                        
                                          
                                        
                                      </tbody></table>
                                    </th>
                                  </tr>
                                </tbody></table>
                              </th>
                            
                          </tr>
                          <!-- END SECTION: Products With Pricing -->
                          <!-- BEGIN SECTION: Payment Info -->
                          <tr id="section-1468272" class="section payment_info">
                            <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                              <table class="table-inner" cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                                <!-- PAYMENT INFO -->
                                
                                  <tbody><tr>
                                    
                                                </tr>
                                              
                                            
                                          </tbody></table>
                                        </th>
                                      </tr>
                <!-- END SECTION: Payment Info -->
                <!-- BEGIN SECTION: Customer And Shipping Address -->
                <tr id="section-1468273" class="section customer_and_shipping_address">
                  <!-- BEGIN : 2 COLUMNS : BILL_TO -->
                  <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                      <tbody><tr>
                        <!-- BEGIN : Column 1 of 2 : BILL_TO -->
                        <th width="50%" class="column_1_of_2 column_bill_to " style="mso-line-height-rule: exactly;" align="left" bgcolor="#ffffff" valign="top">
                          <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%;" role="presentation">
                            <tbody>

                              <tr>

                              <th style="mso-line-height-rule: exactly; padding-right: 5%;" align="left" bgcolor="#ffffff" valign="top">
                                <h3 data-key="1468273_bill_to" style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; color: #bdbdbd; font-size: 14px; line-height: 52px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;" align="left">Billing Info </h3>
                              </th>

                            </tr>


                            <tr>
                            @foreach ($orders as $order)
                                  
                                <th class="billing_address" style="mso-line-height-rule: exactly; padding-right: 5%;" align="left" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left"> <p> {{ $order->billing_firstname }}  {{ $order->billing_lastname }}</p>
                                  <p>{{ $order->billing_email }}</p>
                                  <p>{{ $order->billing_phone }}</p>
                                  <p>{{ $order->billing_address1 }}</p>
                                  <p> {{ $order->billing_address2 }}</p>
                                  <p>{{ $order->billing_city }}, {{ $order->billing_state }}, {{ $order->billing_zip_code }}</p>
                                      
                                </th>
                                @endforeach
                            </tr>

                          </tbody></table>
                        <!-- END : Column 1 of 2 : BILL_TO -->
                        <!-- BEGIN : Column 2 of 2 : SHIP_TO -->
                                             
                          </tbody></table>
                        </th>
                        <!-- END : Column 2 of 2 : SHIP_TO -->
                      </tr>
                    </tbody></table>
                  </th>
                  <!-- END : 2 COLUMNS : SHIP_TO -->
                </tr>
                                      <!-- END SECTION: Customer And Shipping Address -->
                                      <!-- BEGIN SECTION: Divider -->
                                      <tr id="section-1468275" class="section divider">
                                        <th style="mso-line-height-rule: exactly; padding: 26px 52px;" bgcolor="#ffffff">
                                          <table cellspacing="0" cellpadding="0" border="0" width="100%" role="presentation">
                                            <tbody><tr>
                                              <th style="mso-line-height-rule: exactly; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid;" bgcolor="#ffffff" valign="top">
                                              </th>
                                            </tr>
                                          </tbody></table>
                                        </th>
                                      </tr>
                                      
                                    </tbody></table>
                                  </td>
                                </tr>
                              </tbody></table>
                            
                            </th>
                          </tr>
                        </tbody></table>
                      </center>
                    </th>
                  </tr>
                </tbody>
              </table>
              <!-- END : CONTAINER -->
            
          
</body>