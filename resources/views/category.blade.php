@extends('Layouts.auth')
@section('content')


<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12 mt-100">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>

                        @foreach ($categories as $item)

                        <li data-filter=".{{ $item->id }}">{{ $item->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">

            @foreach ($products as $item)

            <div class="text-center col-lg-4 col-md-6 {{ $item->category_id }}">

                <a href="/singleproduct/{{ $item->id }}">
                    <div class="single-product-item">
                        <div class="product-image">

                            <img style='max-height:250px;min-height:250px' src="{{ $item->imagepath }}" alt="">

                        </div>
                        <h3>{{ $item->name }}</h3>
                        <span class="badge badge-danger">{{ $item->category->name }}</span>
                        <p class="product-price"> {{ $item->price }}$<span> Per Kg</span> </p>
                        <p class="product-price"><span>Quantity</span> {{ $item->quantity }} </p>
                        <p> {{ $item->description }} </p>
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

        <div class="row">
            <div class="text-center col-lg-12">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end products -->

@endsection