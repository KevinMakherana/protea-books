@extends('layouts.app')

@section('title', 'Checkout — Protea Books')

@section('content')
    <h1 class="mb-4">Checkout</h1>

    <div class="row">
        <div class="col-md-7">
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="customer_name" class="form-label">Full Name</label>
                    <input type="text" id="customer_name" name="customer_name" class="form-control"
                           value="{{ old('customer_name') }}" required>
                    @error('customer_name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="customer_email" class="form-label">Email</label>
                    <input type="email" id="customer_email" name="customer_email" class="form-control"
                           value="{{ old('customer_email') }}" required>
                    @error('customer_email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="shipping_address" class="form-label">Shipping Address</label>
                    <textarea id="shipping_address" name="shipping_address" class="form-control" rows="3" required>{{ old('shipping_address') }}</textarea>
                    @error('shipping_address')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Place Order</button>
            </form>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    @foreach ($items as $item)
                        <div class="d-flex justify-content-between small mb-1">
                            <span>{{ $item['book']->title }} &times; {{ $item['quantity'] }}</span>
                            <span>R{{ number_format($item['subtotal'], 2) }}</span>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span>R{{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection