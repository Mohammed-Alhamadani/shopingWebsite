@extends('Layouts.master')
@section('content')
<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="text-center col-lg-8 offset-lg-2">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> Products</h3>
                </div>
            </div>
        </div>

        <div class="row">

            @foreach ($products as $item)

            <div class="text-center col-lg-4 col-md-6">
                <a href="/singleproduct/{{ $item->id }}">
                    <div class="single-product-item">
                        <div class="product-image">
                            <img src="{{asset($item ->imagepath)}}"
                                style="min-height: 250px ! important; max-height:250px !important;" alt="">
                        </div>
                        <h3>{{$item ->name}}</h3>
                        <span class="badge badge-danger">{{ $item->category->name }}</span>
                        <p>{{$item ->description}}</p>
                        <p class="product-price">Price {{$item ->price}}$</p>
                        <p>{{$item ->description}}</p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        <a href="/deleteproduct/{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash"></i>
                            Delete</a>
                        <a href="/editproduct/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-edit"></i>
                            Edit</a>

                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- end pr
oduct section -->
@endsection