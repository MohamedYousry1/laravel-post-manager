<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#4f46e5">
    <meta name="description" content="Yosry Blog — a modern blog platform built with Laravel 12. Create, read, update and delete posts with a clean, premium interface.">
    <title>@yield('title', 'Yosry Blog')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Bootstrap 5.3.8 (preserved from original) -->
    <link href="https://unpkg.com/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts: Plus Jakarta Sans + Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Pro design system -->
    <link href="{{ asset('css/pro.css') }}" rel="stylesheet">

    @stack('head')
</head>

<body>

    <!-- ============ Navbar ============ -->
    <nav class="navbar navbar-expand-lg pro-navbar">
        <div class="container">
            <a class="navbar-brand pro-brand" href="{{ url('/') }}">
                <span class="pro-brand-logo"><i class="bi bi-journal-richtext"></i></span>
                <span class="pro-brand-text">
                    Yosry Blog
                    <small>Laravel 12 &middot; Posts Studio</small>
                </span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link pro-nav-link @if(request()->routeIs('posts.index')) active @endif" aria-current="page" href="{{ route('posts.index') }}">
                            <i class="bi bi-collection"></i> All Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pro-nav-link @if(request()->routeIs('posts.create')) active @endif" href="{{ route('posts.create') }}">
                            <i class="bi bi-pencil-square"></i> Create
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="btn btn-primary btn-sm px-3" href="{{ route('posts.create') }}">
                            <i class="bi bi-plus-lg me-1"></i> New Post
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ============ Main content ============ -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- ============ Footer ============ -->
    <footer class="pro-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5 col-md-6">
                    <div class="pro-footer-brand">
                        <span class="pro-brand-logo"><i class="bi bi-journal-richtext"></i></span>
                        Yosry Blog
                    </div>
                    <p class="mb-0" style="color:#94a3b8;max-width:380px;">
                        A clean, server-rendered blog platform built on Laravel 12.
                        Create, read, update and delete posts with a premium editorial interface.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Explore</h5>
                    <ul class="list-unstyled d-grid gap-2">
                        <li><a href="{{ route('posts.index') }}"><i class="bi bi-chevron-right me-1 small"></i> All Posts</a></li>
                        <li><a href="{{ route('posts.create') }}"><i class="bi bi-chevron-right me-1 small"></i> Create Post</a></li>
                        <li><a href="{{ url('/') }}"><i class="bi bi-chevron-right me-1 small"></i> Home</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h5>Built with</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="pro-chip pro-chip-muted"><i class="bi bi-lightning-charge"></i> Laravel 12</span>
                        <span class="pro-chip pro-chip-muted"><i class="bi bi-code-slash"></i> Blade</span>
                        <span class="pro-chip pro-chip-muted"><i class="bi bi-database"></i> Eloquent</span>
                        <span class="pro-chip pro-chip-muted"><i class="bi bi-bootstrap"></i> Bootstrap 5</span>
                    </div>
                </div>
            </div>
            <div class="pro-footer-bottom">
                <span>&copy; {{ date('Y') }} Yosry Blog. Crafted with <i class="bi bi-heart-fill text-danger mx-1"></i> on Laravel.</span>
                <span><i class="bi bi-shield-check me-1"></i> CSRF-protected &middot; Server-rendered</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    @stack('scripts')
</body>

</html>
