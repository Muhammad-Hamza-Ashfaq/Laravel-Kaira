@extends('layouts.app')

@section('title', 'Cart')

@section('content')

@php
    $cart = session('cart', []);
    $total = 0;
@endphp

<h3 class="text-center">Your Cart Items</h3>
<div class="container">
    @if (session()->has('cart') && count(session('cart')) > 0)
        
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                {{-- <th scope="col">ID</th> --}}
                <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($cart as $id => $item )
    
    <tr>
        {{-- <th scope="row">1</th> --}}
        <td>{{ $item['name'] }}</td>
        <td><img src="images/{{ $item['image'] }}" width="60" height='70' style="border-radius:16px;"></td>
        <td>{{ $item['description'] }}</td>
        <td>{{ $item['price'] }}</td>
        <td>{{ $item['quantity'] }}</td>
        <td>
            @if ($item['quantity'] >= 0)
                <form action="{{ route('home.updateCart', $id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="action" value="decrement" >
                    <button type='submit' class="btn btn-sm btn-outline-secondary">-</button>
                </form>
                
                <small>{{ $item['quantity'] }}</small>

                <form action="{{ route('home.updateCart' , $id) }}" method="POST">
                @csrf
                <input type="hidden" name="action" value="increment">
                <button type="submit" class="btn btn-sm btn-outline-secondary">+</button>
                </form>
            
            @endif
        </td>
    </tr>
    @php
        $total = $total + ($item['price'] * $item['quantity']);
    @endphp
    @endforeach
</tbody>
</table>
            <span>Total (USD)</span>
            <strong>{{ $total }}</strong>
@else
<p> Cart is Empty </p>
@endif

@if ( session()->has('cart') && count(session('cart')) > 0 )
    <a class="w-100 btn btn-primary btn-lg" href="{{ route('home.checkout') }}">Continue To Checkout</a>
@endif
</div>
@endsection