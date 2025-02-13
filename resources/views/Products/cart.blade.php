@extends('Layouts.auth')
@section('content')

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
                                    <td class="product-remove"><a href="/deletecartitem/{{ $item->id }}"><i
                                                class="far fa-window-close"></i></a></td>
                                    <td class="product-image"><img src="{{ asset($item->product->imagepath) }}"
                                            alt="{{ $item->name }}">
                                    </td>
                                    <td class="product-name">{{ $item->product->name }}</td>
                                    <td class="product-price">{{ $item->product->price }}$</td>
                                    <td class="product-quantity">
                                        <form action="{{ route('update.cart.quantity') }}" method="POST">
                                            @csrf
                                            <input type="number" name="quantity" placeholder="0"
                                                value="{{ $item->quantity }}">
                                            <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                            <button type="submit">Update Quantity</button>
                                        </form>
                                    </td>
                                    <td class="product-total">{{ $item->quantity * $item->product->price }}$</td>
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
                                    <td>{{ $cart->sum(function ($item) { return $item->quantity * $item->product->price;
                                        }) }}$</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <a href="checkout.html" class="boxed-btn black">Check Out</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- end cart -->

@endsection