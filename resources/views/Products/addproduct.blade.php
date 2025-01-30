@extends('Layouts.master')
@section('content')



<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="text-center col-lg-8 offset-lg-2">
                <div class="section-title">
                    <h3><span class="orange-text">Add</span> Products</h3>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="mb-5 col-lg-12 mb-lg-0">
                <div class="form-title">
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" action="/storeproduct" id="fruitkha-contact">
                        @csrf
                        <p>
                            <input type="text" required style="width: 100%" placeholder="Name" name="name" id="name"
                                value="{{ old('name') }}">
                            <span class="text-danger">
                                @error('name')
                                {{ $message }}

                                @enderror
                            </span>
                        </p>
                        <p style="display: flex">
                            <input type="number" required style="width: 50%" class="mr-4" placeholder="Price"
                                name="price" id="price" value="{{ old('price') }}">
                            <span class="text-danger">
                                @error('price')
                                {{ $message }}

                                @enderror
                            </span>
                            <input type="number" required style="width: 50%" placeholder="Quantity" name="quantity"
                                id="quantity" value="{{ old('quantity') }}">
                            <span class="text-danger">
                                @error('quantity')
                                {{ $message }}

                                @enderror
                            </span>

                        </p>
                        <p>
                            <select class="mb-3 form-select form-select-lg" name="category_id" id="category_id">
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </p>
                        <p><textarea required name="description" id="description" cols="30" rows="10"
                                placeholder="Description" value="{{ old('description') }}"></textarea>
                            <span class="text-danger">
                                @error('description')
                                {{ $message }}

                                @enderror
                            </span>
                        </p>
                        <p><input type="submit" value="Add"></p>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
