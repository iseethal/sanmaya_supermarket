<?php

namespace App\Http\Controllers\frontend;


use App\Models\Cart;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use Razorpay\Api\Api;
use App\Mail\MailNotify;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\ProductQuantity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
  
    public function checkout(Request $request)
    {

        $cart = Cart::where('user_id', Auth::id())->get();  
        $brands = Brand::orderBy('id','ASC')->get();   
        $cartcount = Cart::where('user_id', Auth::id())->count();

        // dd($cart->toArray());

        if($cartcount > 0){

        if(Auth::id()){

            return view('frontend.checkout', compact('cart','brands'));  
        }          

        }

        else
        {
            return redirect()->route('shop')->with('error','Please add something to your cart.');

        }
        
        
    }   

    public function store(Request $request)
    {      
 
        // $order = Order::where('user_id', Auth::id())->first();
        $order = Order::where('user_id', Auth::id())->limit(1)->latest()->get(); 
        
        $cart = Cart::where('user_id', Auth::id())->get(); 
        $cartcount = Cart::where('user_id', Auth::id())->count();

        $val1 = $request->payment_type;

        $request->validate([

            'billing_firstname' => 'required',
            'billing_lastname' => 'required',
            'billing_phone' => 'required|numeric',
            'billing_email' => 'required|email',
            'billing_address1' => 'required',
            'billing_city' => 'required',
            'billing_state' => 'required',
            'billing_zip_code' => 'required|numeric',
           

        ]);

        if($val1 == 'cash_on_delivery')
        {
         if($cartcount > 0){

            $orders = new Order;
            $orders->user_id = Auth::id();
        
            $orders->tax = 0;
            $orders->transaction_id = 'COD';
            $orders->order_date = Carbon::now('Asia/Kolkata');

            $orders->billing_firstname = $request->input("billing_firstname");
            $orders->billing_lastname = $request->input("billing_lastname");
            $orders->billing_phone = $request->input("billing_phone");
            $orders->billing_email = $request->input("billing_email");
            $orders->billing_address1 = $request->input("billing_address1");
            $orders->billing_address2 = $request->input("billing_address2");
            $orders->billing_city = $request->input("billing_city");
            $orders->billing_state = $request->input("billing_state");
            $orders->billing_zip_code = $request->input("billing_zip_code");
            $orders->order_notes = $request->input("order_notes");

            $orders->shipping_name = $request->input("shipping_name");
            $orders->shipping_country = $request->input("shipping_country");
            $orders->phone = $request->input("phone");
            $orders->shipping_address1 = $request->input("shipping_address1");
            $orders->shipping_address2 = $request->input("shipping_address2");
            $orders->shipping_town = $request->input("shipping_town");
            $orders->shipping_state = $request->input("shipping_state");
            $orders->shipping_zipcode = $request->input("shipping_zipcode");


            $total = 0;
            foreach($cart as $item){

                $total += $item['amount'] * $item['quantity'];

            }

            $orders->total= $total;

            $orders->save();

            $orders->id;

            foreach($cart as $item)
            {
              
                OrderItem::create([
                    'order_id' =>$orders->id,
                    'product_id' =>$item->product_id,
                    'product_name' =>$item->product_name,
                    'quantity' =>$item->quantity,
                    'amount' =>$total,
                    'qty_name' =>$item->qty_name,
                    'qty_amount' =>$item->amount

                ]);
            }


            if(Auth::id())
            {
                $user = User::where('id', Auth::id())->first();
                $user->fname = $request->input("billing_firstname");
                $user->lname = $request->input("billing_lastname");
                $user->phone = $request->input("billing_phone");
                $user->address1 = $request->input("billing_address1");
                $user->address2 = $request->input("billing_address2");
                $user->city = $request->input("billing_city");
                $user->state = $request->input("billing_state");
                $user->zip_code = $request->input("billing_zip_code");
                $user->shipping_address1 = $request->input("shipping_address1");
                $user->update();
            
        }  
        
            $email = Auth::user()->email;
            Mail::to($email)->send(new MailNotify($user, $order, $cart));

            Cart::destroy($cart);
     }

         return redirect('my-account');

    }

    else{


        $orders = new Order;
        $orders->user_id = Auth::id();
       
        $orders->tax = 0;
        $orders->transaction_id = '1234';
        $orders->order_date = Carbon::now('Asia/Kolkata');

        $orders->billing_firstname = $request->input("billing_firstname");
        $orders->billing_lastname = $request->input("billing_lastname");
        $orders->billing_phone = $request->input("billing_phone");
        $orders->billing_email = $request->input("billing_email");
        $orders->billing_address1 = $request->input("billing_address1");
        $orders->billing_address2 = $request->input("billing_address2");
        $orders->billing_city = $request->input("billing_city");
        $orders->billing_state = $request->input("billing_state");
        $orders->billing_zip_code = $request->input("billing_zip_code");
        $orders->order_notes = $request->input("order_notes");

        $orders->shipping_name = $request->input("shipping_name");
        $orders->shipping_country = $request->input("shipping_country");
        $orders->phone = $request->input("phone");
        $orders->shipping_address1 = $request->input("shipping_address1");
        $orders->shipping_address2 = $request->input("shipping_address2");
        $orders->shipping_town = $request->input("shipping_town");
        $orders->shipping_state = $request->input("shipping_state");
        $orders->shipping_zipcode = $request->input("shipping_zipcode");

        $cart = Cart::where('user_id', Auth::id())->get(); 

        $total = 0;
        foreach($cart as $item){

            $total += $item['amount'] * $item['quantity'];

        }

        $orders->total= $total;

        $orders->save();

        $orders->id;

        foreach($cart as $item)
        {
            OrderItem::create([
                'order_id' =>$orders->id,
                'product_id' =>$item->product_id,
                'product_name' =>$item->product_name,
                'quantity' =>$item->quantity,
                'amount' =>$total,
                'qty_name' =>$item->qty_name,
                'qty_amount' =>$item->amount

            ]);
        }
        
                
    }

        if(Auth::id())
        {
             $user = User::where('id', Auth::id())->first();
             $user->fname = $request->input("billing_firstname");
             $user->lname = $request->input("billing_lastname");
             $user->phone = $request->input("billing_phone");
             $user->address1 = $request->input("billing_address1");
             $user->address2 = $request->input("billing_address2");
             $user->city = $request->input("billing_city");
             $user->state = $request->input("billing_state");
             $user->zip_code = $request->input("billing_zip_code");
             $user->shipping_address1 = $request->input("shipping_address1");
             $user->update();
        
       }  
      
       $email = Auth::user()->email;

       Mail::to($email)->send(new MailNotify($user, $order, $cart));
        
        return redirect('payment');

       
    }

    public function payment(Request $request)
    {

        $id = $request->id;   

        $api = new Api('rzp_test_APvrNv6aeKU8tq', 'H2ry5Q50yL2ttQhymu6ANCFk');       
       
        $cart = Cart::where('user_id', Auth::id())->get(); 
        $brands = Brand::orderBy('id','ASC')->get();          
       

        if(Cart::count()!== null) {

        $total_amount = 0;

        foreach($cart as $item){

            $total_amount += $item['amount'] * $item['quantity']  * 100;

        }

        $orderData = [
            'receipt'         => time(),
            'amount'          => $total_amount, 
            'currency'        => 'INR',
            'payment_capture' => 1 ,// auto capture

                    

        ];
        $razorpayOrder = $api->order->create($orderData);

        $orders = Order::where('user_id', Auth::id())->latest()->limit(1)-> get();   

        return view('frontend.payment', compact('cart','razorpayOrder','brands','orders'));

    }
    else{

        return redirect()->route('shop')->with('error','Please add something to your cart.');       

             
    }        

    }

    public function Details()
    {
        $cart = Cart::where('user_id', Auth::id())->get(); 

        $brands = Brand::orderBy('id','ASC')->get();          
   

        $orders = Order::where('user_id', Auth::id())->limit(1)->latest()->get(); 

        return view('frontend.order-details', compact('cart','brands','orders'));
    }
  

}
