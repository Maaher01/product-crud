@extends('layouts.app')
@section('content')
<div class="container mt-5">
<div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Products</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Add New
        </a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Description</th>
          <!-- @if($products->some(fn($product) => auth()->user()->canany(['update', 'delete'], $product))) -->
          <th scope="col">
            <!-- Actions -->
          </th>
          <!-- @endif -->
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td>{{ $product->name }}</th>
          <td>{{ $product->price }}</td>
          <td>{{ $product->description }}</td>
          <!-- @if(auth()->user()->canany(['update', 'delete'], $product)) -->
          <td> 
            <!-- Edit Button -->
            @can('update', $product)
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm">
                <i class="bi bi-pencil-square"></i>
            </a>
            @endcan
            <!-- Delete Button -->
            @can('delete', $product)
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">
                <i class="bi bi-trash3-fill"></i>
              </button>
            </form>
            @endcan
          </td>
          <!-- @endif -->
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection