@extends('layouts.app')

@section('title', 'Protea Books — Home')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="mb-1">Find your next read</h1>
            <p class="text-muted">Browse our collection of fiction, non-fiction, and South African stories.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="list-group">
                <a href="{{ route('books.index') }}"
                   class="list-group-item list-group-item-action {{ !$selectedCategory ? 'active' : '' }}">
                    All Categories
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('books.index', ['category' => $category->slug]) }}"
                       class="list-group-item list-group-item-action {{ $selectedCategory === $category->slug ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="col-md-9">
            @if ($books->isEmpty())
                <p class="text-muted">No books found in this category.</p>
            @else
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    @foreach ($books as $book)
                        <div class="col">
                            <div class="card book-card shadow-sm">
                                @if ($book->cover_image)
                                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" style="height: 220px; width: 100%; object-fit: cover;">
                                @else
                                    <div class="book-cover-placeholder">No Cover</div>
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title mb-1">{{ $book->title }}</h6>
                                    <p class="text-muted small mb-2">{{ $book->author }}</p>
                                    <p class="fw-bold mb-2">R{{ number_format($book->price, 2) }}</p>
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-success mt-auto">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $books->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection