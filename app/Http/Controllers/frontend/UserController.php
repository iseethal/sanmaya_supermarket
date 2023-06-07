<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProductQuantity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //

   public function Index()
   {

    $cart = Cart::where('user_id', Auth::id())->get();  
    $brands = Brand::orderBy('id','ASC')->get(); 
    $slider=Slider::orderBy('id','DESC')->get();


    return view('frontend.login',compact('cart','brands','slider'));
   }

    public function Login(Request $request)
    {
        // dd($request->all());

        $cart = Cart::where('user_id', Auth::id())->get();           
        $brands = Brand::orderBy('id','ASC')->get();  
        $slider=Slider::orderBy('id','DESC')->get();
        $featured = Product::where('is_featured',1)
        ->where('is_deleted','<>','1')
        ->latest()
        ->get();
        $quantity = ProductQuantity::where('is_deleted','<>','1')->orderBy('id','desc')->get();

        $banner = Banner::get();          

        
        $check=$request->all();
        if(Auth::guard('web')->attempt(['email'=>$check['email'],'password'=>$check['password'] ])){
           
            return redirect()->route('index');
            // return view('frontend.index',compact('cart','brands','slider','featured','quantity','banner'))->with('error','User Login Successfully');
        }else{

            return back()->with('message','Invalid Email Or Password');
        }
    }

    

     public function Register(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->get();           
        $brands = Brand::orderBy('id','ASC')->get(); 
        $slider=Slider::orderBy('id','DESC')->get();
        $featured = Product::where('is_featured',1)
        ->where('is_deleted','<>','1')
        ->latest()
        ->get(); 
        $quantity = ProductQuantity::where('is_deleted','<>','1')->orderBy('id','desc')->get();

        $banner = Banner::get();          


        $email = $request->email;
       
        $userEmailDetails = User::where('email', '=', $email)->first();
      
            if ($userEmailDetails === null) {

                $user = User::insert([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'device_type' => 'web',
                    'created_at'=>Carbon::now(),
        
                ]);
                 
            } 
            else{

            return back()->with('message','Email id  Exists');

            }

        $check=$request->all();
        
        if(Auth::guard('web')->attempt(['email'=>$check['email'],'password'=>$check['password'] ])){
           
            return redirect()->route('index');

            // return view('frontend.index',compact('cart','brands','slider','featured','quantity','banner'))->with('error','User Login Successfully');
        }else{

            echo "Email Exists";
        }
        
    }
   

    public function Logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('message','User Logout Successfully');

    }

    public function UserProfileStore(Request $request)
    {
     $cart = Cart::where('user_id', Auth::id())->get();   
     
     $brands = Brand::orderBy('id','ASC')->get();  

     $id=Auth::user()->id;
     $data=User::find($id);     
     $data->name = $request->name;
     $data->email = $request->email;     
     $data->save(); 
     return redirect()->route('login');
    }

    public function ChangePassword()
    {
        $cart = Cart::where('user_id', Auth::id())->get();   
     
        $brands = Brand::orderBy('id','ASC')->get();  

        return view('frontend.profile.changepassword',compact('cart','brands'));
    }

    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
  
        ]);
  
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();
            return redirect()->route('user.logout')->with("error", "Password changed successfully!");
        } 

      else{

        return redirect()->route('changepassword')->with("error", "Old Password Doesn't match!");         
           
            return redirect()->back();
        }
       

    }

     public function Contact()
    {

        $cart = Cart::where('user_id', Auth::id())->get();  
        $brands = Brand::orderBy('id','ASC')->get(); 
       
              
        return view('frontend.contact_us', compact('cart','brands'));
    }
    
    public function aboutus()
    {
        $brands = Brand::orderBy('id','ASC')->get(); 
               
        $cart = Cart::where('user_id', Auth::id())->get();  
        return view('frontend.about_us', compact('cart','brands'));
    }
   
}
