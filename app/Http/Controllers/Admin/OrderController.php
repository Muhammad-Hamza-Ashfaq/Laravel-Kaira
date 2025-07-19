<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $allOrders = Order::with('order_items')->orderBy('created_at')->paginate(9);
        return view('admin.orders.index', compact('allOrders'));
    }

    public function show($id)
    {
        $order = Order::with('order_items.product')->findOrFail($id);
        return view("admin.orders.show", compact('order'));
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|in:pending,shipped,delivered,canceled',
        ]);

        $order->status = $validated['status'];
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', "Order Status Has Been Updated!");
    }
}
