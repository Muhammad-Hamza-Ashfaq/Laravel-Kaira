@extends('layouts.admin')

@section('title', 'Admin - Products')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role='alert'>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">
    <h3 class="text-center">All Products</h3>  <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Add Product</a>
        
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Discounted Price</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Stock Quantity</th>
                <th scope="col">Season</th>
                <th scope="col">Is Active</th>
                <th scope="col">Is Featured</th>
                <th scope="col">Is New Arrival</th>
                <th scope="col">Is Best Selling</th>
                <th scope="col">Is Recommended</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product )
            <tr>
            {{-- <th scope="row">1</th> --}}
                <td>{{ $product['id'] }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discounted_price }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{ asset('images/' . $product->image) }}" width="60" height='70' style="border-radius:16px;"></td>
                <td>{{ $product->stock_quantity }}</td>
                <td>{{ $product->season }}</td>
                <td>{{ $product->is_active }}</td>
                <td>{{ $product->is_featured }}</td>
                <td>{{ $product->is_new_arrival }}</td>
                <td>{{ $product->is_best_selling }}</td>
                <td>{{ $product->is_recommended }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class='btn btn-sm btn-warning'>Edit</a> 
                    <form action={{ route('admin.products.destroy', $product->id) }} method="POST" onsubmit="return confirm('Are you sure you want to delete this Product?');">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger mt-2">Delete</button>
                    </form>
                </td>
                
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
      <div class="d-flex justify-content-center mt-4">
        {{-- {{ $allProducts->withQueryString()->links() }} --}}
        {{$products->withQueryString()->links('pagination::bootstrap-5') }}

      </div>
</div>
@endsection