<?php

namespace App\Http\Controllers\frontend;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\Brand;
use App\Models\BlogDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blog()
    {
     $cart = Cart::where('user_id', Auth::id())->get();           
     $brands = Brand::orderBy('id','ASC')->get(); 

     $blogs = Blog::get();

     $details = BlogDetails::where('is_active', 1)->latest()->limit(4)->get();
     $blog_details = BlogDetails::latest()->paginate(3);


        return view('frontend.blog.blog_view', compact('cart','brands','blogs','details','blog_details'));
    }

   public function BlogDetails(Request $request)
   {

    $cart = Cart::where('user_id', Auth::id())->get();           
    $brands = Brand::orderBy('id','ASC')->get();  

    $id=$request->id; 
    $blog_details = BlogDetails::findOrFail($id);

    $blogs = Blog::get();

    $details = BlogDetails::where('is_active', 1)->latest()->get();

    $cat_id = $blog_details->category_id;

    $related_blogs = BlogDetails::where('category_id', $cat_id)->where('id', '!=', $id)->get();
  
    return view('frontend.blog.blog_details',compact('cart','brands','blog_details','blogs','details','related_blogs'));
   }
}
