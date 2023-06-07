<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AboutusController extends Controller
{
    //

    public function aboutus()
    {
        $brands = Brand::limit(7)->get();         
       
        $cart = Cart::where('user_id', Auth::id())->get();
        
        return view('frontend.about_us', compact('brands','cart'));
    }
}
