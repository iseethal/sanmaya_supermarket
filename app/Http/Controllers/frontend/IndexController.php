<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductQuantity;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    //

    public function index(Request $request)
    {
        $id=$request->id; 

        $brands = Brand::orderBy('id','ASC')->get();          
        $banner = Banner::get();          

        $categories = Category::where('is_deleted','<>','1')->orderBy('title','ASC')->get();
        $quantity = ProductQuantity::where('is_deleted','<>','1')->orderBy('id','desc')->get();

        $slider=Slider::orderBy('id','DESC')->get();

        $featured = Product::where('is_featured',1)
        ->where('is_deleted','<>','1')
        ->latest()
        ->get();             

        $cart = Cart::where('user_id', Auth::id())->get(); 


        return view('frontend.index',compact('categories','featured','slider','cart','brands','quantity','banner'));
       

    }


    


    
   
    
}
