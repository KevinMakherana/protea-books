@extends('admin.layouts.app')

@section('title', 'Add Book — Protea Books Admin')

@section('content')
    <h1 class="mb-4">Add Book</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.books._form', ['book' => null])
                <button type="submit" class="btn btn-success">Save Book</button>
                <a href="{{ route('admin.books.index') }}" class="btn btn-link">Cancel</a>
            </form>
        </div>
    </div>
@endsection