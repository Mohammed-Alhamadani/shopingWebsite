<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $result= Category::all();

    return view('welcome',['categories'=>$result]);
});


Route::get('/product/{catId?}', function ($catId=null) {

    if($catId==null) {
        $result= DB::table('Products')->get();
    }
    else{

        $result= DB::table('Products')->where('category_id',$catId)->get();
    }
    return view('product',['products'=>$result]);
});
// Route::get('/product', function () {
//     $result= DB::table('Products')->get();
//     return view('product',['products'=>$result]);
// });


Route::get('/category', function () {


    return view('category');
});
