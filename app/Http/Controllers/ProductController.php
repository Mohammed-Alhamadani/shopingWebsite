<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('product', ['products' => $products]);
    }

    public function AddProduct()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                $categories = Category::all();
                return view('Products.addproduct', ['categories' => $categories]);
            } else {
                $products = Product::paginate(6);
                return view('product', ['products' => $products]);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20|string|unique:products',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required',
            'imagepath' => 'required|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        ]);

        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->price = $request->price;
        $newProduct->quantity = $request->quantity;
        $newProduct->description = $request->description;
        $newProduct->category_id = $request->category_id;
        $imagePath = $request->imagepath->move('uploads', Str::uuid()->toString() . '-' . $request->file('imagepath')->getClientOriginalName());
        $newProduct->imagepath = $imagePath;
        $newProduct->save();
        return redirect('/productstable');
    }


    public function StoreProductImage(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'imagepath' => 'image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        ]);

        $newProduct = new ProductImage();
        $newProduct->product_id = $request->id;
        $productId=$request->id;
        $imagePath = $request->imagepath->move('uploads', Str::uuid()->toString() . '-' . $request->file('imagepath')->getClientOriginalName());
        $newProduct->imagepath = $imagePath;
        $newProduct->save();
        return redirect("/AddProductImages/$productId");
    }

    public function show($catId = null)
    {
        if ($catId) {
            $result = Product::where('category_id', $catId)->paginate(6);
            return view('product', ['products' => $result]);
        } else {
            $result = Product::paginate(6);
            return view('product', ['products' => $result]);
        }
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                $product = Product::find($id);
                $product->delete();
                return redirect('/product');
            } else {
                return redirect()->back()->with('error', 'You do not have permission to delete products.');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function editProduct($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                $categories = Category::all();
                $product = Product::findOrFail($id);
                return view('Products.editproduct', ['product' => $product, 'categories' => $categories]);
            } else {
                $products = Product::paginate(6);
                return view('product', ['products' => $products]);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function updateProduct(Request $request, $id)
    {
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

    public function showSingleProduct($id)
    {
        $SingleProduct = Product::find($id);

        // if (!$SingleProduct) {
        //     return redirect()->to('/product')->with('error', 'Product not found');
        // }

        $relatedProducts=Product::where('category_id',$SingleProduct->category_id)->where('id','!=',$id)
        ->inRandomOrder()
        ->limit(3)
        ->get();
        return view('Products.singlePage', ['singleProduct' => $SingleProduct,'relatedProducts'=>$relatedProducts]);
    }

    public function ProductsTable()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                $products = Product::all();
                return view('Products.producttable', ['products' => $products]);
            } else {
                $products = Product::paginate(6);
                return view('product', ['products' => $products]);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function AddProductImages($productId)
    {
        // Fetch the product by ID
        $product = Product::find($productId);

        // Handle the case when the product is not found
        if (!$product) {
            return redirect()->to('/product')->with('error', 'Product not found');
        }

        // Retrieve product images (assuming there's a relationship for images)
        $productImages = $product->productImages;

        // Return the view with product and images
        return view('Products.AddProductImage',['product'=>$product, 'productImages'=>$productImages]);
    }



    public function DeleteProductImage($id=null){

        if($id!= null){

            $currentImage=ProductImage::find($id);
            $productId = $currentImage->product_id;
            $currentImage->delete();
            return redirect("AddProductImages/$productId");
        }else{
            abort(403,"Please enter image id in the route");
        }


    }
}
