@extends('admin.layouts.app')

@section('title', 'Edit Category — Protea Books Admin')

@section('content')
    <h1 class="mb-4">Edit Category</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}" required autofocus>
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Update Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-link">Cancel</a>
            </form>
        </div>
    </div>
@endsection