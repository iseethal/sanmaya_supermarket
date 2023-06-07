<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\frontend\PayController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\CheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('index');
// })->middleware(['auth'])->name('index');

require __DIR__.'/auth.php';

// User All Route

Route::middleware(['auth:sanctum,web', 'verified'])->get('/', function () {
    $id=Auth::user()->id;
    $user=User::find($id);
    return view('index',compact('user'));
})->name('index');


Route::get('/login',[UserController::class,'Index'])->name('login');
Route::post('/login',[UserController::class,'Login'])->name('user.login');
Route::get('/logout',[UserController::class,'Logout'])->name('user.logout');

Route::post('/register',[UserController::class,'Register'])->name('user.register');   
Route::post('update', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/changepassword', [UserController::class, 'ChangePassword'])->name('changepassword');
Route::post('/storepassword', [UserController::class, 'UpdatePassword'])->name('storepassword');


Route::get('/', [IndexController::class, 'index'])->name('index');


Route::get('/shop', [ShopController::class, 'Shop'])->name('shop');
Route::get('/product_details', [shopController::class, 'Details'])->name('product_details');
// Route::get('/findprice', [shopController::class, 'FindPrice'])->name('findprice');
Route::get('/search', [shopController::class, 'search'])->name('search');


Route::post('/addcart/{id}', [CartController::class, 'addcart'])->name('addcart');
Route::get('/cart', [CartController::class, 'ShowCart'])->name('cart');
Route::get('/delete/{id}', [CartController::class, 'RemoveCart'])->name('delete');
Route::get('/load-cart-data', [CartController::class, 'cartcount'])->name('load-cart-data');

Route::post('/cartupdate', [CartController::class, 'UpdateCart'])->name('cartupdate');

// checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('store', [CheckoutController::class, 'store'])->name('store');
Route::get('payment', [CheckoutController::class, 'payment'])->name('payment');
Route::post('/make-payment', [PayController::class, 'MakePayment'])->name('make-payment');
Route::get('/success', [PayController::class, 'success'])->name('success');
Route::get('/my-account', [PayController::class, 'Myaccount'])->name('my-account');
Route::get('/order-details', [CheckoutController::class, 'Details'])->name('order-details');

Route::post('/cod', [PayController::class, 'COD'])->name('cod');


Route::get('/blog',[BlogController::class,'Blog'])->name('blog');
Route::get('/blogdetails',[BlogController::class,'BlogDetails'])->name('blogdetails');

Route::get('/about',[UserController::class,'aboutus'])->name('about');

Route::get('/contact',[UserController::class,'Contact'])->name('contact');

