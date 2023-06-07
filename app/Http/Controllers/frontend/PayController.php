<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;

use Razorpay\Api\Api;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PayController extends Controller
{
    public $api;
    public function __construct($foo = null) {

        $this->api = new Api('rzp_test_APvrNv6aeKU8tq', 'H2ry5Q50yL2ttQhymu6ANCFk');
        
    }
      

    public function MakePayment(Request $request)
    {

        $orders = Order::where('user_id', Auth::id())
        ->join('order_items','orders.id','=','order_items.order_id')
        ->select('orders.*','order_items.*')
        ->get();        
        $cart = Cart::where('user_id', Auth::id())->get(); 

        $brands = Brand::limit(7)->latest()->get();         

        if(Cart::count() != null) {
       
        $total_amount = 0;

        foreach($cart as $item){

            $total_amount += $item['amount'] * $item['quantity']  * 100;

        }

        $api = new Api('rzp_test_APvrNv6aeKU8tq', 'H2ry5Q50yL2ttQhymu6ANCFk');
        $orderid = rand(111111,999999);
        
        $orderData = [
            'receipt'         => time(),
            'amount'          => $total_amount, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1 ,// auto capture

            'notes'  =>[

                'order_id' => $orderid,

            ],            

        ];

        $razorpayOrder = $api->order->create($orderData);

         
         return view('frontend.payment', compact('cart','orders','razorpayOrder','brands'));
       

            }
            else{

                return redirect()->route('shop')->with('error','Please add something  to your cart.');

        
            }
    
              

    }

    public function success(Request $request)
    {
             

       $status = $this->api->payment->fetch($request->get('payment_id'));      

       $paid = $request->get('payment_id');

       if(Auth::id())
       {

         $order = Order::where('user_id', Auth::id())->first();
         $order->transaction_id = $paid;     

         $order->update();

         $cart = Cart::where('user_id', Auth::id())->get(); 

         Cart::destroy($cart);

         if($status->status == 'captured'){

            return redirect()->route('my-account')->with('success','payment successfully done');

         }
        
            return redirect()->route('my-account')->with('failed','payment failed');          
        
      }            

    }

    public function Myaccount()
    {
        $cart = Cart::where('user_id', Auth::id())->get();         

        $orders = Order::where('user_id', Auth::id())->orderBy('order_date','DESC')->limit(25)->get(); 

       
        $brands = Brand::limit(7)->latest()->get();  
        
       return view('frontend.myaccount',compact('cart','orders','brands'));

    }

    public function COD()
    {
        $cart = Cart::where('user_id', Auth::id())->get(); 

        $orders = Order::where('user_id', Auth::id())->get(); 

        Cart::destroy($cart);

        return redirect('my-account');
    }
    
}
