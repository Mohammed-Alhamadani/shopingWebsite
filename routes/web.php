<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/',[CategoryController::class,'index']);

Route::get('/singleproduct/{id}',[ProductController::class,'showSingleProduct']);

Route::get('/product/{catId?}',[ProductController::class,'show']);


Route::get('/deleteproduct/{id}',[ProductController::class,'destroy']);
Route::get('/editproduct/{id}',[ProductController::class,'editProduct']);
Route::PUT('/updateproduct/{id}',[ProductController::class,'updateProduct']);


Route::get('/category', function () {
    $categories= Category::all();
    $product= Product::all();
    return view('category',['products'=>$product,'categories'=>$categories]);
});


Route::get('/addproduct',[ProductController::class,'AddProduct']);
Route::post('/storeproduct',[ProductController::class,'storeProduct']);
