<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

@extends('Layouts.auth')
@section('content')



<div class="product-section mt-150 mb-150">
    <div class="container mt-5 mb-5" style="max-width: 1500px;">

        <a href="/addproduct/" class="btn btn-primary"><i class="fas fa-plus"></i>
            Add Product</a>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item )

                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td> <img src="{{ asset($item->imagepath) }}" alt="{{ $item->name }}" width="100px" height="100px">
                    </td>
                    <td> <a href="/deleteproduct/{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash"></i>
                            Delete</a>
                        <a href="/editproduct/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-edit"></i>
                            Edit</a>
                        <a href="/AddProductImages/{{ $item->id }}" class="btn btn-warning"><i class="fas fa-image"></i>
                            Add Image </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>

@endsection


<script>
    $(document).ready( function () {
        let table = new DataTable('#myTable');
    } );
</script>
