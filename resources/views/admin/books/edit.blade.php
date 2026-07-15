@extends('admin.layouts.app')

@section('title', 'Edit Book — Protea Books Admin')

@section('content')
    <h1 class="mb-4">Edit Book</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.books._form')
                <button type="submit" class="btn btn-success">Update Book</button>
                <a href="{{ route('admin.books.index') }}" class="btn btn-link">Cancel</a>
            </form>
        </div>
    </div>
@endsection