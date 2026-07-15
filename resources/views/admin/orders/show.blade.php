@extends('admin.layouts.app')

@section('title', 'Order #' . $order->id . ' — Protea Books Admin')

@section('content')
    <a href="{{ route('admin.orders.index') }}" class="btn btn-link ps-0 mb-3">&larr; Back to orders</a>

    <h1 class="mb-4">Order #{{ $order->id }}</h1>

    <div class="row">
        <div class="col-md-7">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Items</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->book_title }}</td>
                                    <td>R{{ number_format($item->unit_price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>R{{ number_format($item->unit_price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end fw-bold">
                        Total: R{{ number_format($order->total, 2) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Customer</h5>
                    <p class="mb-1"><strong>{{ $order->customer_name }}</strong></p>
                    <p class="mb-1">{{ $order->customer_email }}</p>
                    <p class="text-muted small mb-0">{{ $order->shipping_address }}</p>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Status</h5>
                    <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select mb-3">
                            <option value="Pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Completed" {{ $order->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="Cancelled" {{ $order->status === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="btn btn-success w-100">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection