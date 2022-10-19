<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/dashboard',[DashboardController::class,'index']);

Route::get('admin/product/create',[ProductController::class,'index'])->name('admin.product.create');
Route::post('admin/product/store',[ProductController::class,'store'])->name('admin.product.store');
Route::get('admin/product/table',[ProductController::class,'table'])->name('admin.product.table');
Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
Route::post('admin/product/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
Route::get('admin/product/delete/{id}',[ProductController::class,'delete'])->name('admin.product.delete');
Route::get('admin/product/detail/{id}',[ProductController::class,'detail'])->name('admin.product.detail');

Route::get('admin/order/table',[OrderController::class,'table'])->name('admin.order.table');
Route::get('admin/order/detail/{id}',[OrderController::class,'detail'])->name('admin.order.detail');

Route::get('admin/user/table',[UserController::class,'table'])->name('admin.user.table');

Route::get('admin/user/detail/{id}',[UserController::class,'detail'])->name('admin.user.detail');
