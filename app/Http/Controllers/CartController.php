<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\orderdetails;
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

public function updateQuantity(Request $request)
{
    $cartItem = Cart::find($request->cart_item_id);
    $cartItem->quantity = $request->quantity;
    $cartItem->save();
    return redirect()->back()->with('success', 'Quantity updated successfully!');
}


public function CompleteOrder(){

    $cart = Cart::where('user_id', Auth::id())->with('product')->get();

    return view('Products.completedorder',['cart'=>$cart]);

}


public function StoreOrder(Request $request){

    $user_id=Auth::id();

    $storeOrder= new Order();
    $storeOrder->name=$request->name;
    $storeOrder->email=$request->email;
    $storeOrder->phone=$request->phone;
    $storeOrder->address=$request->address;
    $storeOrder->note=$request->note;
    $storeOrder->user_id=$user_id;

    $storeOrder->save();


    $cart = Cart::where('user_id', Auth::id())->with('product')->get();

    foreach($cart as $item){

        $storeOrderDetail= new orderdetails();
        $storeOrderDetail->product_id= $item->product_id;
        $storeOrderDetail->price= $item->product->price;
        $storeOrderDetail->quantity= $item->quantity;
        $storeOrderDetail->order_id= $storeOrder->id;
        $storeOrderDetail->save();


    }

    // Clear the cart

    Cart::where('user_id',$user_id)->delete();


    return redirect('/');

}

public function OrderHistory(){

    $order=Order::where('user_id',$id=Auth::id())->with('orderdetails')->get();

    return view('/Products.orderhistory',compact('order'));


}


}


