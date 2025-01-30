<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AddProduct(){

        $categories=Category::all();
        return view('Products.addproduct',['categories'=>$categories]);
    }

    public function storeProduct(Request $request){

        $request->validate([
            'name'=>'required|max:20|string|unique:products',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'description'=>'required',

        ]);

        $newProduct=new Product();
        $newProduct->name=$request->name;
        $newProduct->price=$request->price;
        $newProduct->quantity=$request->quantity;
        $newProduct->description=$request->description;
        $newProduct->category_id=$request->category_id;

        $newProduct->save();

        return redirect('/product');

    }
}
