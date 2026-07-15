@extends('admin.layouts.app')

@section('title', 'Dashboard — Protea Books Admin')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted small">Total Books</div>
                    <div class="fs-3 fw-bold">{{ $stats['total_books'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted small">Total Orders</div>
                    <div class="fs-3 fw-bold">{{ $stats['total_orders'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted small">Pending Orders</div>
                    <div class="fs-3 fw-bold">{{ $stats['pending_orders'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted small">Revenue</div>
                    <div class="fs-3 fw-bold">R{{ number_format($stats['revenue'], 2) }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection