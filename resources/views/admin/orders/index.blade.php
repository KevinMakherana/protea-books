@extends('admin.layouts.app')

@section('title', 'Orders — Protea Books Admin')

@section('content')
    <h1 class="mb-4">Orders</h1>

    <table class="table bg-white align-middle">
        <thead>
            <tr>
                <th>Order #</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>
                        {{ $order->customer_name }}
                        <div class="text-muted small">{{ $order->customer_email }}</div>
                    </td>
                    <td>R{{ number_format($order->total, 2) }}</td>
                    <td>
                        <span class="badge
                            @if ($order->status === 'Completed') bg-success
                            @elseif ($order->status === 'Cancelled') bg-danger
                            @else bg-warning text-dark
                            @endif">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-secondary">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-muted">No orders yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $orders->links() }}
@endsection