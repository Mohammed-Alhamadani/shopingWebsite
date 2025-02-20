@extends('Layouts.auth')
@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Single Product</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->






    <!-- single product -->
    <div class="single-product mt-150 mb-150">
        <div class="container" style="margin-top:300px;">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ asset($singleProduct->imagepath )}}" alt="{{ $singleProduct->name }}"
                            style="width: 500px;height:500px;">
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $singleProduct->name }}</h3>
                        <p class="single-product-pricing"><span>Per Kg</span> ${{ $singleProduct->price }}</p>
                        <p>{{ $singleProduct->description }}</p>
                        <div class="single-product-form">
                            <form action="index.html">
                                <input type="number" placeholder="0">
                            </form>
                            <a href="addproducttocart/{{ $singleProduct->id }}" class="cart-btn"><i
                                    class=" fas fa-shopping-cart"></i> Add to
                                Cart</a>
                            <p><strong>Categories: </strong>{{ $singleProduct->category->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="testimonail-section mt-80 mb-150">
            <div class="container">
                <div class="row">
                    <div class="text-center col-lg-10 offset-lg-1">
                        <div class="testimonial-sliders">




                            {{-- @foreach ($singleProduct->productImages as $image)


                            <div class="single-testimonial-slider">
                                <a href="/singleproduct/{{ $singleProduct->id }}">
                                    <div class="client-avater">
                                        <img src="{{ asset($image->imagepath )}}" alt="{{ $singleProduct->name }}"
                                            style="width: 30%;height:250px;max-width:none !important;border-radius:5px 100px !important;">
                                    </div>
                                    <div class="mt-5 client-meta">
                                        <h3>{{ $singleProduct->name }}<span style="color: #f28123">{{
                                                $singleProduct->category->name }}</span></h3>
                                    </div>
                                </a>
                            </div>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end single product -->

        <!-- more products -->
        <div class="more-products mb-150">
            <div class="container">
                <div class="row">
                    <div class="text-center col-lg-8 offset-lg-2">
                        <div class="section-title">
                            <h3><span class="orange-text">Related</span> Products</h3>
                            <p>Check out these related products that you might also like!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($relatedProducts as $item )


                    <div class="text-center col-lg-4 col-md-6">
                        <a href="/singleproduct/{{ $item->id}}">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <img src="{{ asset($item->imagepath) }}" alt="{{ $item->name }}">
                                </div>
                                <h3>{{ $item->name }}</h3>
                                <p class="orange-text">{{ $item->category->name }}</p>
                                <p class="product-price"><span>Per Kg</span> {{ $item->price }}$ </p>
                                <a href="/addproducttocart/{{ $item->id }}" class="cart-btn"><i
                                        class=" fas fa-shopping-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </a>
                    </div>


                    @endforeach

                </div>
            </div>
        </div>
        <!-- end more products -->



        <!-- jquery -->
        <script src="assets/js/jquery-1.11.3.min.js"></script>
        <!-- bootstrap -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- count down -->
        <script src="assets/js/jquery.countdown.js"></script>
        <!-- isotope -->
        <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
        <!-- waypoints -->
        <script src="assets/js/waypoints.js"></script>
        <!-- owl carousel -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- magnific popup -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!-- mean menu -->
        <script src="assets/js/jquery.meanmenu.min.js"></script>
        <!-- sticker js -->
        <script src="assets/js/sticker.js"></script>
        <!-- main js -->
        <script src="assets/js/main.js"></script>

</body>

</html>

@endsection