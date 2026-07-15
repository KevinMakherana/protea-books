@extends('admin.layouts.app')

@section('title', 'Categories — Protea Books Admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add Category</a>
    </div>

    <table class="table bg-white">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th># Books</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td class="text-muted">{{ $category->slug }}</td>
                    <td>{{ $category->books_count }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-muted">No categories yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection