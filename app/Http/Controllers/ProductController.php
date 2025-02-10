<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(){
        $products= Product::all();
        return view('product',['products'=>$products]);
    }
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
            'imagepath'=>'required|image|mimes:jpeg,png,jpg,gif,avif|max:2048',

        ]);

        $newProduct=new Product();
        $newProduct->name=$request->name;
        $newProduct->price=$request->price;
        $newProduct->quantity=$request->quantity;
        $newProduct->description=$request->description;
        $newProduct->category_id=$request->category_id;
        $imagePath=$request->imagepath->move('uploads',Str::uuid()->toString(). '-' .$request->file('imagepath')->getClientOriginalName());
        $newProduct->imagepath=$imagePath;
        $newProduct->save();

        return redirect('/product');

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

    public function destroy($id){

        $product=Product::find($id);

        $product->delete();

        return redirect('/product');

    }

    public function editProduct($id){
        $categories=Category::all();
        $product=Product::findOrFail($id);

        return view('Products.editproduct',['product'=>$product,'categories'=>$categories]);

    }

    // public function updateProduct(Request $request,$id){
    //     $product=Product::find($id);
    //     $product->update($request->all());
    //     return redirect('/product');

    // }

    public function updateProduct(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:20|string|unique:products,name,' . $id,
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required',
            'imagepath' => 'sometimes|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        ]);

        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if ($request->has('imagepath')) {
            $imagePath = $request->imagepath->move('uploads', Str::uuid()->toString() . '-' . $request->imagepath->getClientOriginalName());
            $product->imagepath = $imagePath;
        }

        $product->save();

        return redirect('/product');
    }
    public function showSingleProduct($id){
        $SingleProduct=Product::find($id);
        return view('Products.singlePage',['singleProduct'=>$SingleProduct]);
    }
}
