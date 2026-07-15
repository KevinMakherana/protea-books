@extends('admin.layouts.app')

@section('title', 'Books — Protea Books Admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Books</h1>
        <a href="{{ route('admin.books.create') }}" class="btn btn-success">Add Book</a>
    </div>

    <table class="table bg-white align-middle">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>
                        @if ($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" style="width: 40px; height: 55px; object-fit: cover;">
                        @else
                            <span class="text-muted small">None</span>
                        @endif
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>R{{ number_format($book->price, 2) }}</td>
                    <td>{{ $book->stock_quantity }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this book?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-muted">No books yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->links() }}
@endsection