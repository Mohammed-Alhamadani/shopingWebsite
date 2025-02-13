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
            $products= Product::where('category_id',$catId)->paginate(10);
            return view('product',['products'=>$products]);
        }
        else{

            $product= Product::paginate(10);
            return view('product',['products'=>$product]);
        }
    }

    public function GetAllCategories () {
        $categories= Category::all();
        $product= Product::paginate(10);
        return view('category',['products'=>$product,'categories'=>$categories]);
    }

}
