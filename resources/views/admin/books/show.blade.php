@extends('layouts.app')

@section('title', $book->title . ' — Protea Books')

@section('content')
    <a href="{{ route('books.index') }}" class="btn btn-link ps-0 mb-3">&larr; Back to catalog</a>

    <div class="row">
        <div class="col-md-4 mb-4">
            @if ($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" style="width: 100%; max-height: 380px; object-fit: cover;">
            @else
                <div class="book-cover-placeholder" style="height: 380px;">No Cover</div>
            @endif
        </div>

        <div class="col-md-8">
            <span class="badge bg-success-subtle text-success-emphasis mb-2">{{ $book->category->name }}</span>
            <h1>{{ $book->title }}</h1>
            <p class="text-muted fs-5">by {{ $book->author }}</p>

            <p class="fs-4 fw-bold text-success">R{{ number_format($book->price, 2) }}</p>

            @if ($book->stock_quantity > 0)
                <p class="text-success mb-3">
                    <strong>In Stock</strong> — {{ $book->stock_quantity }} available
                </p>
            @else
                <p class="text-danger mb-3"><strong>Out of Stock</strong></p>
            @endif

            @if ($book->description)
                <p>{{ $book->description }}</p>
            @endif

            @if ($book->stock_quantity > 0)
                <form action="{{ route('cart.add', $book) }}" method="POST" class="d-flex align-items-center gap-2 mt-4">
                    @csrf
                    <label for="quantity" class="form-label mb-0">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1"
                           max="{{ $book->stock_quantity }}" class="form-control" style="width: 80px;">
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            @endif
        </div>
    </div>
@endsection