@extends('layouts.admin')

@section('title', 'Edit Order')

@section('content')
<div class="container">
    <h3>Edit Order #{{ $order->id }}</h3>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                @foreach(['pending', 'shipped', 'delivered', 'canceled'] as $status)
                    <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Status</button>
    </form>

    <hr>
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
