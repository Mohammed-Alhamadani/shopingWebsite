<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/',[CategoryController::class,'index']);

Route::get('/singleproduct/{id}',[ProductController::class,'showSingleProduct']);

Route::get('/category/{catId?}',[CategoryController::class,'index']);
Route::get('/product/{catId?}',[ProductController::class,'show']);


Route::get('/deleteproduct/{id}',[ProductController::class,'destroy']);
Route::get('/editproduct/{id}',[ProductController::class,'editProduct']);
Route::PUT('/updateproduct/{id}',[ProductController::class,'updateProduct']);


Route::get('/category', function () {
    $categories= Category::all();
    $product= Product::all();
    return view('category',['products'=>$product,'categories'=>$categories]);
});


//Add & Store Products
Route::get('/addproduct',[ProductController::class,'AddProduct']);
Route::post('/storeproduct',[ProductController::class,'storeProduct']);


// search route

Route::post('/search', function(Request $request) {
    $searchKey = $request->searchkey;

    $products = Product::where('name', 'like', '%' . $searchKey . '%')
        ->orWhereHas('category', function($query) use ($searchKey) {
            $query->where('name', 'like', '%' . $searchKey . '%');
        })
        ->get();

    return view('product', ['products' => $products]);
});
