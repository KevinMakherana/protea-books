@extends('layouts.app')

@section('title', 'Contact Us — Protea Books')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h1 class="mb-3">Contact Us</h1>
            <p class="text-muted mb-4">Have a question about an order, a book, or anything else? Reach out directly — we're happy to help.</p>

            <div class="card">
                <div class="card-body py-4">
                    <p class="mb-2">
                        <strong>Email:</strong><br>
                        <a href="mailto:info@proteabooks.co.za">info@proteabooks.co.za</a>
                    </p>
                    <p class="mb-0">
                        <strong>Phone:</strong><br>
                        <a href="tel:+27123456789">+27 12 345 6789</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection