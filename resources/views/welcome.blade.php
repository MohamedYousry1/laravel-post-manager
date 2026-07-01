@extends('layouts.app')

@section('title', 'Yosry Blog — Premium Laravel Blogging')

@section('content')

<!-- ============ Hero ============ -->
<section class="pro-hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 pro-animate">
                <span class="pro-eyebrow mb-3">
                    <i class="bi bi-stars"></i> Laravel 12 &middot; Posts Studio
                </span>
                <h1>
                    Write, share and <span class="text-gradient">curate</span><br>
                    stories that matter.
                </h1>
                <p class="lead">
                    Yosry Blog is a clean, server-rendered publishing platform built on Laravel 12 and Blade.
                    Create, read, update and delete posts with a smooth editorial interface that gets out of your way.
                </p>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="{{ route('posts.index') }}" class="btn btn-gradient btn-lg">
                        <i class="bi bi-collection me-1"></i> Browse Posts
                    </a>
                    <a href="{{ route('posts.create') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-pencil-square me-1"></i> Start Writing
                    </a>
                </div>
                <div class="row g-3 mt-4" style="max-width:520px;">
                    <div class="col-4">
                        <div class="pro-stat">
                            <div class="pro-stat-num">CRUD</div>
                            <div class="pro-stat-label">Full Lifecycle</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="pro-stat">
                            <div class="pro-stat-num">Blade</div>
                            <div class="pro-stat-label">Server-rendered</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="pro-stat">
                            <div class="pro-stat-num">12.x</div>
                            <div class="pro-stat-label">Laravel LTS</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pro-animate pro-animate-2">
                <div class="position-relative">
                    <img src="{{ asset('images/hero-landing.png') }}" class="pro-hero-image">
                    <div class="pro-card pro-shadow position-absolute" style="bottom:-22px; left:-14px; padding:.85rem 1.1rem; max-width:240px;">
                        <div class="d-flex align-items-center gap-3">
                            <span class="pro-author-avatar" style="width:42px;height:42px;font-size:1rem;">YB</span>
                            <div>
                                <div class="fw-bold" style="font-size:.92rem;line-height:1.1;">Yosry Blog</div>
                                <small class="text-muted">Posts Studio</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ Features ============ -->
<section class="pro-section">
    <div class="container">
        <div class="text-center mb-5 pro-animate">
            <span class="pro-eyebrow mb-3"><i class="bi bi-grid-3x3-gap"></i> Features</span>
            <h2 class="mb-2">Everything you need to publish</h2>
            <p class="text-muted mx-auto" style="max-width:640px;">
                A focused, no-nonsense posts manager with thoughtful UX touches baked in —
                from inline validation to a smart edit form that prevents accidental no-ops.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4 pro-animate pro-animate-1">
                <div class="pro-feature">
                    <div class="pro-feature-icon"><i class="bi bi-arrow-repeat"></i></div>
                    <h3>Full Posts CRUD</h3>
                    <p>List, view, create, edit and delete posts through a server-rendered Blade interface with route model binding.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pro-animate pro-animate-2">
                <div class="pro-feature">
                    <div class="pro-feature-icon accent"><i class="bi bi-people"></i></div>
                    <h3>Author Linking</h3>
                    <p>Each post is linked to a user through an Eloquent <code>belongsTo</code> relationship, demonstrating clean one-to-many modelling.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pro-animate pro-animate-3">
                <div class="pro-feature">
                    <div class="pro-feature-icon success"><i class="bi bi-shield-check"></i></div>
                    <h3>Server Validation</h3>
                    <p>Inline Blade error display on create and edit forms, with <code>old()</code> repopulation for a frictionless retry.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pro-animate pro-animate-1">
                <div class="pro-feature">
                    <div class="pro-feature-icon pink"><i class="bi bi-lightbulb"></i></div>
                    <h3>Smart Edit Form</h3>
                    <p>The Update button stays disabled until something actually changes — no more accidental no-op submissions.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pro-animate pro-animate-2">
                <div class="pro-feature">
                    <div class="pro-feature-icon sky"><i class="bi bi-calendar3"></i></div>
                    <h3>Carbon Date Formatting</h3>
                    <p>Beautifully formatted dates on the index and detail pages powered by Laravel's native Carbon integration.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pro-animate pro-animate-3">
                <div class="pro-feature">
                    <div class="pro-feature-icon"><i class="bi bi-phone"></i></div>
                    <h3>Responsive by Default</h3>
                    <p>Mobile-first layout with hidden columns, stacked action buttons and a fluid card grid that adapts to any screen.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ CTA ============ -->
<section class="pro-section-sm">
    <div class="container">
        <div class="pro-card text-center p-5" style="background:var(--pro-gradient-soft);border-color:var(--pro-line);">
            <div class="pro-feature-icon mx-auto mb-3" style="width:60px;height:60px;font-size:1.75rem;"><i class="bi bi-rocket-takeoff"></i></div>
            <h2 class="mb-2">Ready to publish your first post?</h2>
            <p class="text-muted mx-auto mb-4" style="max-width:520px;">
                Jump straight into the editor and start writing. The form is wired with validation,
                CSRF protection and form repopulation out of the box.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <a href="{{ route('posts.create') }}" class="btn btn-gradient btn-lg">
                    <i class="bi bi-plus-lg me-1"></i> Create a Post
                </a>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-lg">
                    <i class="bi bi-eye me-1"></i> View All Posts
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
