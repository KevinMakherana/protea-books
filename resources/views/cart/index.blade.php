@extends('layouts.app')

@section('title', 'Your Cart — Protea Books')

@section('content')
    <h1 class="mb-4">Your Cart</h1>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($items->isEmpty())
        <p class="text-muted">Your cart is empty. <a href="{{ route('books.index') }}">Browse books</a>.</p>
    @else
        <table class="table align-middle">
            <thead>
                <tr>
                    <th></th>
                    <th>Book</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>
                            @if ($item['book']->cover_image)
                                <img src="{{ asset('storage/' . $item['book']->cover_image) }}" alt="{{ $item['book']->title }}" style="width: 40px; height: 55px; object-fit: cover;">
                            @else
                                <span class="text-muted small">No cover</span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $item['book']->title }}</div>
                            <div class="text-muted small">{{ $item['book']->author }}</div>
                        </td>
                        <td>R{{ number_format($item['book']->price, 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>R{{ number_format($item['subtotal'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item['book']) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end align-items-center gap-3">
            <span class="fs-5">Total: <strong>R{{ number_format($total, 2) }}</strong></span>
            <a href="{{ route('checkout.show') }}" class="btn btn-success">Proceed to Checkout</a>
        </div>
    @endif
@endsection