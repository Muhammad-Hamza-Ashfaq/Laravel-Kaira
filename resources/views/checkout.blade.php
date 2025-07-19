@extends('layouts.app')

@section('title', 'Checkout')
@section('content')

@if(session()->has('cart') && count(session('cart')) > 0)
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role='alert'>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<h3 class="text-center">Secure CheckOut</h3>
<hr>
<div class='container mt-2'>
    <form method="POST" action="{{ route('home.placeOrder') }}">
        @csrf
        <div class="row">
            <div class='col-md-6 mb-3'>
                <label for='fname' class="form-label">First Name</label>
                <input type='text' name='fname' class="form-control" placeholder="John" required >
            </div>
            <div class='col-md-6 mb-3'>
                <label for='lname' class="form-label">Last Name</label>
                <input type='text' name='lname' class="form-control" placeholder="Doe" required>                
            </div>
        </div>

        <div class="row">
            <div class='col-md-6 mb-3'>
                <label for='email' class="form-label">Email</label>
                <input type='email' name='email' class="form-control" placeholder="example@example.com" required >
            </div>
            <div class='col-md-6 mb-3'>
                <label for='phone' class="form-label">Phone</label>
                <input type='text' name='phone' class="form-control" placeholder="+92300*******" required>                
            </div>
        </div>

        <div class="row">
            <div class='col-md-12 mb-3'>
                <label for='address' class="form-label">Address</label>
                <textarea name="address" class="form-control" required placeholder="House 123, St: abc"></textarea>
            </div>
        </div>

        <div class="row">
            <div class='col-md-3 mb-3'>
                <label for='city' class="form-label">City</label>
                <input type='text' name='city' class="form-control" placeholder="London" required >
            </div>
            <div class='col-md-3 mb-3'>
                <label for='state' class="form-label">State/Province</label>
                <input type='text' name='state' class="form-control" placeholder="California" required>                
            </div>
            <div class='col-md-3 mb-3'>
                <label for='zip' class="form-label">Postal/Zip Code</label>
                <input type='text' name='zip' class="form-control" placeholder="123456" required>                
            </div>
            <div class='col-md-3 mb-3'>
                <label for='country' class="form-label">Country</label>
                <input type='text' name='country' class="form-control" placeholder="Pakistan" required>                
            </div>
        </div>
        <div class="row">
            <div class='col-md-12 mb-3'>
                <label for='payment_method' class="form-label">Payment Method</label>
                <select name="payment_method" class="form-select" required>
                    <option value="cod">Cash On Delivery</option>
                    {{-- <option value="cod">Cash On Delivery</option> --}}
                </select>
            </div>
        </div>

    <hr>    
        <h5 class="mt-4">Order Summary</h5>
            <ul class=list-group mb-3>
                @php
                    $total = 0;
                @endphp

                @foreach (session('cart') as $id => $item )
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        <img src="images/{{ $item['image'] }}" style="width:50px; height:60px; border-radius:20px;">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $item['name'] }} (x{{ $item['quantity'] }})
                            <span>${{ number_format(($item['discounted_price'] ?? $item['price']) * $item['quantity'], 2) }}</span>
                        </li>
                        @php
                            $total = $total + (($item['discounted_price'] ?? $item['price']) * $item['quantity']);
                        @endphp

                @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Total Price</strong>
                            <span>${{ number_format($total, 2) }}</span>
                        </li>
            </ul>   
            <input type="hidden" name="total_price" value={{ $total }}>
            <div class="text-end">
                <button type="submit" class="btn btn-success">Place Order</button>
            </div>
        </form>
</div>
@else
<p>You have no items in your cart!</p>
<p>Click  <a href="{{ route('home.shop') }}">here</a> to continue shopping.</p>
@endif
@endsection