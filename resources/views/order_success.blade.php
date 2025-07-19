@extends('layouts.app')

@section('title', 'Order Success')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="container">    
    <p><a href="{{ route('home.shop') }}">Continue Shopping</a></p>
</div>
@endif
@endsection