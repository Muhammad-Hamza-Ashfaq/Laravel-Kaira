@extends('layouts.app')

@section('title', 'Shop -- Kaira')
@section('content')
<div class="container my-5">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 mb-4">
      <h5 class="mb-3">Categories</h5>
      <ul class="list-group">
        <li class="list-group-item px-3 {{ request()->is('shop') ? 'bg-success' : '' }}">
          <a href="{{ route('home.shop') }}" class="text-decoration-none  {{ request()->is('shop') ? 'text-white' : '' }}">All</a>
        </li>
        @foreach ($allCategories as $category)
          <li class="list-group-item px-3 {{ request()->is('shop/category/'.$category->slug) ? 'bg-success' : '' }}">
            <a href="{{ route('home.shopByCategory', $category->slug) }}" class="text-decoration-none {{ request()->is('shop/category/'.$category->slug) ? 'text-white' : '' }}">
              {{ $category->name }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    <!-- Product Listings -->
    @php
      $cart = session('cart', []);
    @endphp
    <div class="col-md-9">
      <div class="row">
        @forelse ($allProducts as $product)
          <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
              <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
              <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">${{ number_format($product->price, 2) }}</p>
                {{-- @if ( $cart[$product->id]['quantity'] == 0) --}}
                @if (!isset($cart[$product->id]))
                <form action="{{ route('home.addToCart', $product->id) }}" method="POST">
                  @csrf
                  <button class="btn btn-primary" type='submit'>Add to Cart</button>
                {{-- <a href="#" class="btn btn-primary">Add to Cart</a> --}}
                </form>
                {{-- @elseif ( $cart[$product->id]['quantity'] > 0 ) --}}
                @elseif ( isset($cart[$product->id]))
                <div class="d-flex align-items-center" style="margin-left:90px">
                  {{-- Minus Button --}}
                  <form action="{{ route('home.updateCart', $product->id )}}" method="POST" >
                   @csrf
                    <input type="hidden" name='action' value="decrement" >
                    <button type='submit' class="btn btn-md btn-outline-secondary"> - </button> 
                  </form> 
                  {{-- Quantity Display --}}
                  <span class="mx-2" >{{ $cart[$product->id]['quantity'] }}</span>
                  {{-- plus button --}}
                      <form action="{{ route('home.updateCart' , $product->id )}}" method="POST" >
                   @csrf
                    <input type="hidden" name='action' value="increment" >
                    <button type='submit' class="btn btn-md btn-outline-secondary"> + </button> 
                  </form> 
                </div>
                
                @endif
              </div>
            </div>
          </div>
        @empty
          <p>No products found.</p>
        @endforelse
      </div>

      <!-- Pagination Links -->
      <div class="d-flex justify-content-center mt-4">
        {{-- {{ $allProducts->withQueryString()->links() }} --}}
        {{ $allProducts->withQueryString()->links('pagination::bootstrap-5') }}

      </div>
    </div>
  </div>
</div>
@endsection
