@extends('layouts.app')

@section('title', 'Order Confirmed — Protea Books')

@section('content')
    <div class="text-center mb-4">
        <h1>Thank you, {{ $order->customer_name }}!</h1>
        <p class="text-muted">Your order #{{ $order->id }} has been placed.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Details</h5>
                    @foreach ($order->items as $item)
                        <div class="d-flex justify-content-between small mb-1">
                            <span>{{ $item->book_title }} &times; {{ $item->quantity }}</span>
                            <span>R{{ number_format($item->unit_price * $item->quantity, 2) }}</span>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between fw-bold mb-3">
                        <span>Total</span>
                        <span>R{{ number_format($order->total, 2) }}</span>
                    </div>
                    <p class="small text-muted mb-0"><strong>Shipping to:</strong><br>{{ $order->shipping_address }}</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('books.index') }}" class="btn btn-outline-success">Continue Shopping</a>
            </div>
        </div>
    </div>
@endsection