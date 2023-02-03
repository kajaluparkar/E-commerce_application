<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontController;



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
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';

Route::get('/',[FrontController::class,'index'])->name('index');


Route::get('admin/dashboard',[DashboardController::class,'index'])->middleware('auth');


//ProductController
Route::get('admin/product/create',[ProductController::class,'index'])->name('admin.product.create')->middleware('auth');
Route::post('admin/product/store',[ProductController::class,'store'])->name('admin.product.store')->middleware('auth');
Route::get('admin/product/table',[ProductController::class,'table'])->name('admin.product.table')->middleware('auth');
Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit')->middleware('auth');
Route::post('admin/product/update/{id}',[ProductController::class,'update'])->name('admin.product.update')->middleware('auth');
Route::get('admin/product/delete/{id}',[ProductController::class,'delete'])->name('admin.product.delete')->middleware('auth');
Route::get('admin/product/detail/{id}',[ProductController::class,'detail'])->name('admin.product.detail')->middleware('auth');


//OrderController
Route::get('admin/order/table',[OrderController::class,'table'])->name('admin.order.table')->middleware('auth');
Route::get('admin/order/detail/{id}',[OrderController::class,'detail'])->name('admin.order.detail')->middleware('auth');

//OrderController
Route::get('admin/user/table',[UserController::class,'table'])->name('admin.user.table')->middleware('auth');
Route::get('admin/user/detail/{id}',[UserController::class,'detail'])->name('admin.user.detail')->middleware('auth');
Route::get('admin/profile',[UserController::class,'profile'])->name('admin.profile')->middleware('verified');
Route::post('admin/profile/store/{id}',[UserController::class,'update'])->name('admin.profile.store')->middleware('verified');


Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

//FrontController
Route::get('signup',[FrontController::class,'detail'])->name('signup');
Route::post('store',[FrontController::class,'store'])->name('store');

Route::get('cart',[FrontController::class,'cart'])->name('cart');

Route::get('/signin',[FrontController::class,'signin'])->name('signin');
Route::post('/signin',[FrontController::class,'signin_store'])->name('signin.store');

Route::get('/profile',[FrontController::class,'profile'])->name('profile');
Route::post('/profile/store/{id}',[FrontController::class,'profile_store'])->name('profile.store')->middleware('verified');

Route::post('cart/store',[FrontController::class,'cart_store'])->name('cart.store');
Route::delete('cart/destroy',[FrontController::class,'destroy'])->name('cart.destroy');
Route::get('cart/remove/{id}',[FrontController::class,'remove'])->name('cart.remove');
Route::get('cart/SaveForLater/{id}',[FrontController::class,'SaveForLater'])->name('cart.SaveForLater');

Route::get('/cart/saveForLater/{id}', [FrontController::class, 'saveForLater'])->name('cart.saveForLater');
Route::delete('/saveForLater/destroy/{id}', [FrontController::class, 'saveForLaterDestroy'])->name('cart.saveForLaterDestroy');
Route::get('/cart/moveToCart/{id}', [FrontController::class, 'moveToCart'])->name('cart.moveToCart');
Route::patch('cart/update/{id}',[FrontController::class,'update'])->name('cart.update');


Route::get('checkout',[FrontController::class,'checkout'])->name('checkout');
Route::post('checkout/store',[FrontController::class,'checkout_store'])->name('checkout.store');
