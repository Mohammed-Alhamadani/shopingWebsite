@extends('Layouts.auth')
@section('content')




<div class="container" style="margin-top: 200px;margin-bottom:200px; ">

    <form action="/storeProductImage" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row" class="col-12">

            <input type="hidden" style="width: 100%" name="id" id='id' value="{{ $product->id }}">
            <div class="col-6">
                <input type="file" name="imagepath" id="imagepath">
            </div>
            <div class="col-6">
                <input type="submit" value="Save">
            </div>
            <span class="text-danger">
                @error('imagepath')
                {{ $message }}

                @enderror
            </span>

        </div>
    </form>




    <div class="row">
        @if($productImages)
        @foreach ($productImages as $item )

        <div class="col-4">
            <img class="mt-2 mb-2 mr-2" src="{{ asset($item->imagepath) }}" alt="" width="300px" height="250px">
            <a href="/deleteproductImage/{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash"></i>
                Delete</a>



        </div>
        @endforeach
        @else
        <p>No product images found.</p>
        @endif
    </div>
</div>


@endsection
