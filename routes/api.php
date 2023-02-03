<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\FrontController;
use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\API\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//ProductController
Route::get('/products',[ProductController::class,'index']);
Route::post('admin/product/store',[ProductController::class,'store']);
Route::get('admin/product/table',[ProductController::class,'table']);
Route::post('admin/product/update/{id}',[ProductController::class,'update']);
Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
Route::get('admin/product/detail/{id}',[ProductController::class,'detail']);

//OrderController
Route::get('admin/order/table',[OrderController::class,'table']);
Route::get('admin/order/detail/{id}',[OrderController::class,'detail']);

//UserController
Route::get('admin/user/table',[UserController::class,'table']);
Route::get('admin/user/detail/{id}',[UserController::class,'detail']);
Route::get('admin/profile',[UserController::class,'profile']);
Route::post('update/{id}',[UserController::class,'update']);


//FrontController
Route::get('/',[FrontController::class,'index']);
Route::get('signup',[FrontController::class,'signup']);
Route::post('store',[FrontController::class,'store']);
Route::post('/signin',[FrontController::class,'signin']);
Route::get('/profile',[FrontController::class,'profile']);
Route::post('profile/update/{id}',[FrontController::class,'profile_update']);

//AuthController
Route::post('/signup',[AuthController::class,'signup']);
Route::post('/signin',[AuthController::class,'signin']);
