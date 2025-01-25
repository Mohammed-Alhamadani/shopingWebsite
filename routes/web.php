<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $result= DB::table('Categories')->get();

    return view('welcome',['categories'=>$result]);
});


Route::get('/product', function () {
    $result= DB::table('Products')->get();
    return view('product',['products'=>$result]);
});


Route::get('/category', function () {


    return view('category');
});
