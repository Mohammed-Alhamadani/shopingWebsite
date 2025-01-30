<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/',[CategoryController::class,'index']);


Route::get('/product/{catId?}', function ($catId=null) {

    if($catId) {
        $result= Product::where('category_id',$catId)->get();
        return view('product',['products'=>$result]);
    }
    else{

        $result= Product::all();
        return view('product',['products'=>$result]);
    }
});
// Route::get('/product', function () {
//     $result= DB::table('Products')->get();
//     return view('product',['products'=>$result]);
// });


Route::get('/category', function () {
    $categories= Category::all();
    $product= Product::all();
    return view('category',['products'=>$product,'categories'=>$categories]);
});


Route::get('/addproduct',[ProductController::class,'AddProduct']);
Route::post('/storeproduct',[ProductController::class,'storeProduct']);
