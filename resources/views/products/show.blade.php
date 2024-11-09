{{-- resources/views/products/show.blade.php --}}
@extends('layouts.app')

@section('content')
<h1 class="text-center mb-4">Product Details</h1>

<div class="card p-4 shadow-sm">

    <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Price:</strong> ${{ $product->price }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
    <p><strong>Image:</strong></p>
    <img src="{{ asset('storage/' . $product->image) }}" width="150" />

    <a href="{{ route('products.index') }}">Back to List</a>
</div>    
@endsection
