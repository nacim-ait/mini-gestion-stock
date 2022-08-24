<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
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
    return view('admin.index');
});

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::get('/login',[AdminController::class,'login']);
    Route::post('/login',[AdminController::class,'check_login']);
    Route::get('/logout',[AdminController::class,'logout']);
Route::get('/register',[AdminController::class,'register']);
Route::post('/register',[AdminController::class,'registerAdmin']);
Route::get('/create-product',[ProductController::class,'createProduct']);
Route::post('add-edit-product/{id?}',[ProductController::class,'addEditProduct']);
Route::get('add-edit-product/{id}',[ProductController::class,'editProduct']);
Route::get('show-product/{id}',[ProductController::class,'showProduct']);
    Route::get('/dashboard',[AdminController::class,'index']);
    Route::get('delete-product/{id}', [AdminController::class,'destroy']);
    Route::post('/search-product',[ProductController::class,'search_product']);
    Route::get('/edit-quantité/{id}',[ProductController::class,'edit_quantité']);
    Route::get('/edit-quantité-moin/{id}',[ProductController::class,'edit_quantité_moin']);
    Route::get('/forgot-password',[AdminController::class,'forgot_password']);
    Route::post('/new_password',[AdminController::class,'new_password']);
});