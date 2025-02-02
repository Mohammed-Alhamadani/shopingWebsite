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

            @foreach ($categories as $item)

            <div class="text-center col-lg-4 col-md-6">
                <a href="/product/{{ $item->id }}">
                    <div class="single-product-item">

                        <div class="product-image">
                            <img src="{{asset($item -> imagepath)}}"
                                style="min-height: 250px ! important; max-height:250px !important;" alt="">
                        </div>
                        <h3>{{$item ->name}}</h3>
                        <p>{{$item ->description}}</p>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- end product section -->
@endsection