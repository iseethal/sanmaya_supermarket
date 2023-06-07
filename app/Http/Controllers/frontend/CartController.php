<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Cart;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductQuantity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class CartController extends Controller
{
    //

    public function addcart(Request $request, $id){
       

        $product  = Product::find($id);
        $quantity = $request->quantity;

        


        $quant=ProductQuantity::where('product_id',$id)->first(); 

        if(Auth::id())
        {

            if(Cart::where('product_id',$id)->where('user_id',Auth::id())->exists())
            {

                return redirect()->back()->with('message','Already added to cart');
                    
            }

            else{
               
                $cart = new Cart;
                $cart->user_id = Auth::id();
                $cart->product_id = $product->id;
                $cart->category_id = $product->category_id;
                $cart->product_name = $product->title;
                $cart->image = $product->image;
                $cart->amount = $request->amount;
                $cart->qty_name = $quant->quantity;
                $cart->qty_id = $quant->id;
                $cart->quantity = $request->product_qty;

                $total = 0;                       
                $total += $quant->amount * $request->product_qty;                            
                $cart->total_amount = $total;               
                $cart->save();  
    
                return redirect()->route('shop')->with('message','product added successfully');

                // return redirect()->back()->with('message','product added successfully');

            }
        }
        else
        {
            return redirect()->route('login');

        }

       } // end mehtod 

        // update cart
        public function UpdateCart(Request $request){   

            // METHOD 2
            $cart               = Cart::find($request->id);
            $cart->quantity     = $request->quantity;
            $cart->total_amount = $request->total_amount;

            $cart->save();

            return redirect()->route('cart')->with('message','product added successfully');
            // ENDS
        
        }


       public function ShowCart(Request $request)
       {
       
        $brands = Brand::orderBy('id','ASC')->get();  
       
      
        if(Auth::id()){

            $cart = Cart::where('user_id', Auth::id())->get();           

            return view('frontend.cart',compact('cart','brands'));


        }
        else
        {
            return redirect()->route('login');

        }

       }

       public function RemoveCart($id)
       {
           cart::destroy($id);
           return redirect()->route('cart')->with('message','Product removed successfully');
   
       }

      static public function cartcount()
       {

        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$cartcount]);

       }


}
