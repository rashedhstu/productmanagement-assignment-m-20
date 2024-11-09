@extends('layouts.app')

@section('content')
<h1 class="text-center mb-4">All Products</h1>

<div class="d-flex justify-content-between mb-3">
    <form action="{{ url('/products') }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search by Product ID or Description">
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </form>
    <div>
        <span style="border: 1px solid;padding:10px">Sort by Name
            <a href="{{ url('/products?sort=name&sort_order=asc') }}" class="btn btn-sm btn-secondary me-2">Ascending </a>
            <a href="{{ url('/products?sort=name&sort_order=desc') }}" class="btn btn-sm btn-secondary me-2">Descending</a>
        </span>
        <span style="border: 1px solid;padding:10px"> Sort by Price
            <a href="{{ url('/products?sort=price&sort_order=asc') }}" class="btn btn-sm btn-secondary">Ascending</a>        
            <a href="{{ url('/products?sort=price&sort_order=desc') }}" class="btn  btn-sm btn-secondary">Descending</a>
        </span>
        
    </div>
</div>

<table class="table table-striped table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->product_id }}</td>
            <td>{{ $product->name }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>{{ $product->stock }}</td>
            <td><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50"></td>
            <td>
                <a href="{{ url('/products/' . $product->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ url('/products/' . $product->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ url('/products/' . $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
@endsection

