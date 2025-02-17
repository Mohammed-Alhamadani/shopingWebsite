@extends('Layouts.auth')

@section('content')

<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Billing Address
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form action="index.html">
                                            <p><input type="text" id="name" name="name" placeholder="Name"></p>
                                            <p><input type="email" id="email" name="email" placeholder="Email"></p>
                                            <p><input type="text" id="address" name="address" placeholder="Address"></p>
                                            <p><input type="tel" id="phone" name="phone" placeholder="Phone"></p>
                                            <p><textarea name="bill" id="bill" cols="30" rows="10"
                                                    placeholder="Say Something"></textarea></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Shipping Address
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="shipping-address-form">
                                        <p>Your shipping address form is here.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card single-accordion">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Card Details
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="card-details">
                                        <!-- cart -->
                                        <div class="product-section">
                                            <div class="cart-section">
                                                <div class="container" style="margin-top:250px;margin-bottom:250px;">
                                                    <div class="row mt-150">
                                                        <div class="col-lg-8 col-md-12">
                                                            <div class="cart-table-wrap">
                                                                <table class="cart-table">
                                                                    <thead class="cart-table-head">
                                                                        <tr class="table-head-row">
                                                                            <th class="product-remove"></th>
                                                                            <th class="product-image">Product Image</th>
                                                                            <th class="product-name">Name</th>
                                                                            <th class="product-price">Price</th>
                                                                            <th class="product-quantity">Quantity</th>
                                                                            <th class="product-total">Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($cart as $item)

                                                                        <tr class="table-body-row">
                                                                            <td class="product-remove"><a
                                                                                    href="/deletecartitem/{{ $item->id }}"><i
                                                                                        class="far fa-window-close"></i></a>
                                                                            </td>
                                                                            <td class="product-image"><img
                                                                                    src="{{ asset($item->product->imagepath) }}"
                                                                                    alt="{{ $item->name }}">
                                                                            </td>

                                                                            <td class="product-name"><a
                                                                                    href="/singleproduct/{{ $item->product->id}}">{{
                                                                                    $item->product->name }}</a></td>

                                                                            <td class="product-price">{{
                                                                                $item->product->price }}$</td>
                                                                            <td class="product-quantity">
                                                                                <form
                                                                                    action="{{ route('update.cart.quantity') }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <input type="number" name="quantity"
                                                                                        placeholder="0"
                                                                                        value="{{ $item->quantity }}">
                                                                                    <input type="hidden"
                                                                                        name="cart_item_id"
                                                                                        value="{{ $item->id }}">
                                                                                    {{-- <button type="submit">Update
                                                                                        Quantity</button> --}}
                                                                                </form>
                                                                            </td>
                                                                            <td class="product-total">{{ $item->quantity
                                                                                * $item->product->price }}$</td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="total-section">
                                                                <table class="total-table">
                                                                    <thead class="total-table-head">
                                                                        <tr class="table-total-row">
                                                                            <th>Total</th>
                                                                            <th>Price</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="total-data">
                                                                            <td><strong>Total: </strong></td>
                                                                            <td>{{ $cart->sum(function ($item) { return
                                                                                $item->quantity * $item->product->price;
                                                                                }) }}$</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end cart -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="cart-buttons">
                    <a href="#" class="boxed-btn">Place Order</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
