<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




Auth::routes(['register'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[CategoryController::class,'index']);

Route::get('/singleproduct/{id}',[ProductController::class,'showSingleProduct']);

Route::get('/category',[CategoryController::class,'GetAllCategories']);
Route::get('/category/{catId?}',[CategoryController::class,'show']);
Route::get('/product/{catId?}',[ProductController::class,'show']);



Route::get('/deleteproduct/{id}',[ProductController::class,'destroy']);
Route::get('/editproduct/{id}',[ProductController::class,'editProduct']);
Route::PUT('/updateproduct/{id}',[ProductController::class,'updateProduct']);




//Add & Store Products
Route::get('/addproduct',[ProductController::class,'AddProduct']);
Route::post('/storeproduct',[ProductController::class,'storeProduct']);
Route::post('/storeProductImage',[ProductController::class,'StoreProductImage']);


// search route

Route::post('/search', function(Request $request) {
    $searchKey = $request->searchkey;

    $products = Product::where('name', 'like', '%' . $searchKey . '%')
        ->orWhereHas('category', function($query) use ($searchKey) {
            $query->where('name', 'like', '%' . $searchKey . '%');
        })
        ->paginate(12);

    return view('product', ['products' => $products]);
});



Route::get('/productstable',[ProductController::class,'ProductsTable']);

Route::get('/AddProductImages/{productId}',[ProductController::class,'AddProductImages']);


// Cart

Route::get('/cart',[CartController::class,'show'])->middleware('auth');

// CheckOut
Route::get('/completeorder',[CartController::class,'CompleteOrder'])->middleware('auth');

Route::get('/addproducttocart/{productId}',[CartController::class,'addproducttocart'])->middleware('auth');

Route::get('/deletecartitem/{itemId}',[CartController::class,'destroy']);
Route::get('/deleteproductImage/{id}',[ProductController::class,'DeleteProductImage']);

Route::post('/update-cart-quantity', [CartController::class, 'updateQuantity'])->name('update.cart.quantity');

// Store Order(checkout)
Route::post('/StoreOrder', [CartController::class, 'StoreOrder']);

// Order History
Route::get('/orderhistory', [CartController::class, 'OrderHistory'])->middleware('auth');
