<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Protea Books')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body { height: 100%; }
        body {
            background-color: #f8f7f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main { flex: 1 0 auto; }
        .navbar-brand { font-weight: 700; letter-spacing: 0.5px; }
        .book-card { transition: transform 0.15s ease; height: 100%; }
        .book-card:hover { transform: translateY(-4px); }
        .book-cover-placeholder {
            background-color: #e9ecef;
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #adb5bd;
            font-size: 0.9rem;
        }
        footer { background-color: #2f3e2f; color: #f1f1f1; flex-shrink: 0; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3d5a3d;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">📚 Protea Books</a>
            <div class="d-flex">
                <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm me-2">Home</a>
                <a href="{{ route('cart.index') }}" class="btn btn-outline-light btn-sm me-2">🛒 Cart</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light btn-sm">Contact Us</a>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="py-4 mt-5">
        <div class="container text-center">
            <small>&copy; {{ date('Y') }} Protea Books. Built as a portfolio project.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>