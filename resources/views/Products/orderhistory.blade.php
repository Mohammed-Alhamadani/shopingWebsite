@extends('Layouts.auth')

@section('content')

<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        @foreach ($order as $item)
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $item->id }}" aria-expanded="true"
                                        aria-controls="collapse{{ $item->id }}">
                                        Order Number {{ $item->id }}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{ $item->id }}" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form action="/StoreOrder" method="post" id="store-order" name="store-order">
                                            @csrf
                                            <p><input type="text" required id="created_at" name="created_at"
                                                    placeholder="created_at"
                                                    value="Order Created  {{ $item->created_at }}">
                                            </p>
                                            <p><input type="text" required id="name" name="name" placeholder="Name"
                                                    value="{{ $item->name }}"></p>
                                            <p><input type="email" required id="email" name="email" placeholder="Email"
                                                    value="{{ $item->email }}">
                                            </p>
                                            <p><input type="text" required id="address" name="address"
                                                    placeholder="Address" value="{{ $item->address }}"></p>
                                            <p><input type="tel" required id="phone" name="phone" placeholder="Phone"
                                                    value="{{ $item->phone }}">
                                            </p>
                                            <p><textarea name="note" id="note" cols="30" rows="10"
                                                    placeholder="Say Something">{{ $item->note }}</textarea>
                                            </p>
                                        </form>
                                        <div class="row mt-150">
                                            <div class="col-lg-8 col-md-12">
                                                <div class="cart-table-wrap">
                                                    <table class="cart-table">
                                                        <thead class="cart-table-head">
                                                            <tr class="table-head-row">

                                                                <th class="product-image">Product Image</th>
                                                                <th class="product-name">Name</th>
                                                                <th class="product-price">Price</th>
                                                                <th class="product-quantity">Quantity</th>
                                                                <th class="product-total">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($item->OrderDetails as $itemNew)
                                                            <tr class="table-body-row">
                                                                <td class="product-image"><img
                                                                        src="{{ asset($itemNew->product->imagepath) }}"
                                                                        alt="{{ $itemNew->name }}">
                                                                </td>

                                                                <td class="product-name"><a
                                                                        href="/singleproduct/{{ $itemNew->product->id}}">{{
                                                                        $itemNew->product->name }}</a></td>


                                                                <td class="product-price">{{
                                                                    $itemNew->price }}$</td>
                                                                <td class="product-quantity">

                                                                    <input type="number" name="quantity" placeholder="0"
                                                                        value="{{ $itemNew->quantity }}">



                                                                </td>





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
                                                                <td>{{ $item->OrderDetails->sum(function ($x) {
                                                                    return
                                                                    $x->quantity * $x->price; }) }}$</td>
                                                                {{-- <td>
                                                                    @dd($item->OrderDetails)



                                                                </td> --}}
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection