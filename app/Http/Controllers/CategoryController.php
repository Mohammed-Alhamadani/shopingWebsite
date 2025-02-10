<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $result= Category::all();

    return view('welcome',['categories'=>$result]);
    }

    public function show ($catId=null) {

        if($catId) {
            $result= Product::where('category_id',$catId)->get();
            return view('product',['products'=>$result]);
        }
        else{

            $result= Product::all();
            return view('product',['products'=>$result]);
        }
    }

    public function GetAllCategories () {
        $categories= Category::all();
        $product= Product::all();
        return view('category',['products'=>$product,'categories'=>$categories]);
    }

}
