<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function show(){


        $cart = Cart::where('user_id', Auth::id())->with('product')->get();

            return view('Products.cart', ['cart' => $cart]);}





public function addproducttocart($productId){

    $userId=Auth::id();

    $result=Cart::where('user_id',$userId)->where('product_id',$productId);

    if($result->count() > 0){
        $result->first()->increment('quantity');
        $result->first()->save();
        return redirect('/product');
    }
    else{

        $newCart = new Cart();
        $newCart->product_id=$productId;
        $newCart->user_id=Auth::user()->id;
        $newCart->quantity=1;

        $newCart->save();
        return redirect('/product');
    }

}


public function destroy($id){
    $cartItem=Cart::findOrFail($id);
    $cartItem->delete();
    return redirect('/cart');

}

}
