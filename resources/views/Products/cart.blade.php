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

                                    <td class="product-name"><a href="/singleproduct/{{ $item->product->id}}">{{
                                            $item->product->name }}</a></td>

                                    <td class="product-price">{{ $item->product->price }}$</td>
                                    <td class="product-quantity">
                                        <input type="number" name="quantity" placeholder="0">

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
                            <a href="/completeorder" class="boxed-btn black">Check Out</a>
                            <a href="/orderhistory" class="boxed-btn black">Orders History</a>
                        </div>
                        {{-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick" />
                            <input type="hidden" name="hosted_button_id" value="BUVQZ7ZBF4WTU" />
                            <input type="hidden" name="currency_code" value="CAD" />
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif"
                                border="0" name="submit" title="PayPal - The safer, easier way to pay online!"
                                alt="Buy Now" />
                        </form> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- end cart -->

@endsection