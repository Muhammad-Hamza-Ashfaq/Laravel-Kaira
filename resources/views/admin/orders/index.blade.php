@extends('layouts.admin')

@section('title', 'Admin - All Orders')

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
    <h3 class="text-center">All Orders</h3>  
    <hr>
    {{-- <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">Create Category</a> --}}
        
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Zip</th>
                <th scope="col">State</th>
                <th scope="col">Country</th>
                <th scope="col">Total Price</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody>
        @foreach ($allOrders as $order )
            <tr>
            {{-- <th scope="row">1</th> --}}
                <td>{{ $order['id'] }}</td>
                <td>{{ $order->fname }}</td>
                <td>{{ $order->lname }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->zip }}</td>
                <td>{{ $order->state }}</td>
                <td>{{ $order->country }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                <td>{{ $order->status }}</td>
                {{-- <td><img src="{{ asset('images/' . $category->image) }}" width="60" height='70' style="border-radius:16px;"></td> --}}
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class='btn btn-sm btn-success'>Order Summary</a> 
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class='btn btn-sm btn-warning mt-2'>Update</a> 
                    {{-- <form action={{ route('admin.categories.destroy', $order->id) }} method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger mt-2">Delete</button>
                    </form> --}}
                </td>
                
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
      <div class="d-flex justify-content-center mt-4">
        {{-- {{ $allProducts->withQueryString()->links() }} --}}
        {{$allOrders->withQueryString()->links('pagination::bootstrap-5') }}

      </div>
</div>
<hr>
@endsection