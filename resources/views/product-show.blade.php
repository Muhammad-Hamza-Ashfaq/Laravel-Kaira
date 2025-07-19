@extends('layouts.app')

@section('title', 'Single Product')

@section('content')

{{-- Start of Classic Winter Collection --}}
@php
    $cart = session('cart', []);
@endphp
@if($product)
  <section class="collection bg-light position-relative py-5">
    <div class="container">
      <div class="row">
        <div class="title-xlarge text-uppercase txt-fx domino">{{ $product->name }}</div>
        <div class="collection-item d-flex flex-wrap my-5">
          <div class="col-md-6 column-container">
            <div class="image-holder">
              <img src="{{asset('images/' . $product->image)}}" alt="{{ $product->name }}" class="product-image img-fluid">
            </div>
        </div>
        <div class="col-md-6 column-container bg-white">
            <div class="collection-content p-5 m-0 m-md-5">
                <h3 class="element-title text-uppercase">{{ $product->name }}</h3>
                <hr>
              <p class="element-title text-uppercase">{{ $product->category->name }}</p>
              <hr>
              <p>{{$product->description }}</p>
              <hr>
              @if ($product->discounted_price)
              <h4 class="element-title text-uppercase">Now For: USD {{ $product->discounted_price ?? $product->price }}</h4>
              <h5 class="element-title text-uppercase">Actual Price: <s>USD {{$product->price }}</s></h5>
              @else
              <h4 class="element-title text-uppercase">Price: USD {{ $product->discounted_price ?? $product->price }}</h4>
              @endif
              {{-- <a href="#" class="btn btn-dark text-uppercase mt-3">Add To Cart</a> --}}

               @if (!isset($cart[$product->id]))
                <form action="{{ route('home.addToCart', $product->id) }}" method="POST">
                  @csrf
                  <button class="btn btn-primary" type='submit'>Add to Cart</button>
                </form>
                @elseif (isset($cart[$product->id]))
                <div class="d-flex align-items-center" style="margin-left:10px">
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
      </div>
    </div>
</section>
@endif
@endsection