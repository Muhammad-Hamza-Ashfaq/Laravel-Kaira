@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')
<div class="container">
    <h3>Order #{{ $order->id }} Details</h3>

    <div class="mb-4">
        <strong>Customer Name/ID:</strong> {{ $order->user_id ?? 'Guest' }} <br>
        <strong>Email:</strong> {{ $order->user->email ?? 'N/A' }} <br>
        <strong>Status:</strong> {{ ucfirst($order->status) }} <br>
        <strong>Order Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}
    </div>

    <h5>Order Items</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->order_items as $item)
            <tr>
                <td>{{ $item->order_id }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        <strong>Total:</strong> ${{ number_format($order->total_price, 2) }}
    </div>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
</div>
@endsection
