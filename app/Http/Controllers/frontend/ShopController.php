<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductQuantity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    
    public function Shop(Request $request)
    {      
        $id=request()->all(); 

        $categories = Category::where('is_deleted','<>','1')->orderBy('title','ASC')->get();
        $brands = Brand::orderBy('id','ASC')->get();  
        $quantity=ProductQuantity::where('is_deleted','<>','1')->orderBy('id','desc')->get();  
        // dd($quantity->toArray());
       
        $cart = Cart::where('user_id', Auth::id())->get();
        
        if(!empty($request->get('id'))){

            $products = Product::where('category_id',$id)->where('is_deleted','<>','1')->latest()->paginate(15)->withQueryString();
           
         }

         else{
           
            $products = Product::latest()->where('is_deleted','<>','1')->paginate(15)->withQueryString();

         }
      
        return view('frontend.shop',compact('categories','products','cart','brands','quantity'));
    }

    public function Details(Request $request)
    {
        
        $id=$request->id;     

        $products = Product::where('category_id',$id);      
        
        $singleProduct = Product::findOrFail($id);
        
        $quant=ProductQuantity::where('product_id',$id)->get();

        $quants=ProductQuantity::where('product_id',$id)->limit(1)->get();

        $cart = Cart::where('user_id', Auth::id())->get(); 
        $brands = Brand::orderBy('id','ASC')->get();          
        $categories = Category::where('is_deleted','<>','1')->orderBy('title','ASC')->get();
 

        $cat_id = $singleProduct->category_id;

        $relatedProduct = Product::where('category_id', '=', $cat_id)
        ->where('is_deleted','<>','1')
        ->where('id', '!=', $id)
        ->get();      
       
        $quantities = ProductQuantity::where('is_active', '=', '1')->orderBy('id','desc')->get();        

        return view('frontend.single_product',compact('singleProduct','quant','relatedProduct','cart','quants','brands','quantities','categories'));
    }   

       function search(Request $req)
       {

          $products=Product::where('title','like','%'.$req->input('query').'%')         
          ->paginate(15)->withQueryString();

          $quantities = ProductQuantity::where('is_active', '=', '1')->orderBy('id','desc')->get();        

           $cart = Cart::where('user_id', Auth::id())->get(); 

            $brands = Brand::orderBy('id','ASC')->get();          


           return view('frontend.search',compact('products','cart','brands','quantities'));
       }

      
}
