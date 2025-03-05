<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\delet_productcontroller;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\modifyproductcontroller;
use App\Models\product;
use App\Models\category;
use App\Models\cart;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Charge;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [indexpagecontroller::class, 'index'])->name('indexpage');

Route::get('/dashboard', function () {

    $tab= DB::table('categories')->get();

    return view('dashboard',['categories' => $tab]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/product/{idcat?}', function($idcat = null){
    if(!$idcat){
        $res= DB::table('products')->get();

        $categories = category::all();
        return view('product',['products'=>$res],compact('categories'));
    }
    else{
        $categories = category::all();
       $res= DB::table('products')->where('category_id',$idcat)->get();
       return view('product',['products'=>$res],compact('categories'));
    }

});
Route::get('/product_detaill/{prodid}', function ($prodid) {

    $row = DB::table('products')->where('id',$prodid)->get();
    $categories = category::all();
    return view('product_detaill',['products'=>$row],compact('categories'));
});

Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/success', function () {
    $categories = category::all();
    return view('success',compact('categories'));
})->name('success');



Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add',[cartcontroller::class,'add'])->name('add.cart');
Route::delete('/remove/{product}/cart',[cartcontroller::class,'removeproductoncar'])->name('remove.cart');
Route::put('/update/{product}/cart',[cartcontroller::class,'updateproductoncart'])->name('update.cart');
Route::delete('/cart/delete/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/admin',function(){

    $categories = category::all();
    return view('admin.index',compact('categories'));


});
Route::get('/list_product',function(){

    $row = product::all();
    return view('admin.list_product',compact('row'));
})->name('product_list');

Route::delete('/list_product/{product}',[delet_productcontroller::class ,'delet'])->name('product.delet');
Route::get('/list_product/{product}/edit',[modifyproductcontroller::class ,'edit'])->name('product.edit');
Route::put('/list_product/{product}',[modifyproductcontroller::class ,'update'])->name('product.update');

require __DIR__.'/auth.php';

