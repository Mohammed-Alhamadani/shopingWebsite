@extends('Layouts.master')
@section('content')


<h2>{{ $singleProduct->name }}</h2>
<img src="{{ $singleProduct->imagepath }}" alt="">
<p>{{ $singleProduct->description }}</p>
<p>{{ $singleProduct->price }}</p>

@endsection