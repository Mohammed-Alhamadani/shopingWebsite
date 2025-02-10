@extends('Layouts.auth')
@section('content')



<style>
    button {
        background-color: #f28123;
        color: #051922;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 15px;
        border: none !important;
        cursor: pointer;
        padding: 15px 25px;
        border-radius: 3px;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        border-radius: 50px !important;
        margin-left: 10px
    }

    button:hover {
        background-color: #011118;
        color: #f28123;
    }
</style>

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="text-center col-lg-8 offset-lg-2">
                <div class="section-title mt-100">
                    <h3><span class="orange-text">Edit</span> Products</h3>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="mb-5 col-lg-12 mb-lg-0">
                <div class="form-title">
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" action="/updateproduct/{{ $product->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <p>
                            <input type="text" required style="width: 100%" placeholder="Name" name="name" id="name"
                                value="{{ $product->name }}">
                            <span class="text-danger">
                                @error('name')
                                {{ $message }}

                                @enderror
                            </span>
                        </p>
                        <p style="display: flex">
                            <input type="number" required style="width: 50%" class="mr-4" placeholder="Price"
                                name="price" id="price" value="{{ $product->price }}">
                            <span class="text-danger">
                                @error('price')
                                {{ $message }}

                                @enderror
                            </span>
                            <input type="number" required style="width: 50%" placeholder="Quantity" name="quantity"
                                id="quantity" value="{{ $product->quantity }}">
                            <span class="text-danger">
                                @error('quantity')
                                {{ $message }}

                                @enderror
                            </span>

                        </p>
                        <p>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($categories as $item)

                                @if ($item->id == $product->category_id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </p>
                        <p><textarea required name="description" id="description" cols="30" rows="10"
                                placeholder="Description">
                                {{ $product->description }}
                            </textarea>
                            <span class="text-danger">
                                @error('description')
                                {{ $message }}

                                @enderror
                            </span>
                        </p>
                        <p>
                            <input type="file" name="imagepath" id="imagepath">
                            <span class="text-danger">
                                @error('imagepath')
                                {{ $message }}

                                @enderror
                            </span>
                        </p>
                        <p>
                            <img src="{{ asset($product->imagepath) }}" alt="Product Image">
                        </p>
                        <p><input type="submit" value="Update"><button
                                onclick="window.location.href='/'">Cancel</button>
                        </p>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
