@extends('layouts.app')

@section('title', 'Post — Yosry Blog')

@section('content')

<div class="container py-4">

    {{-- Back link --}}
    <a href="{{ route('posts.index') }}" class="btn btn-ghost btn-sm mb-4">
        <i class="bi bi-arrow-left me-1"></i> Back to all posts
    </a>

    @php
        $authorName = $post->user ? $post->user->name : 'Not Found';
        $initials = '';
        foreach (explode(' ', $authorName) as $word) {
            if ($word !== '' && $word !== 'Not') {
                $initials .= strtoupper(substr($word, 0, 1));
            }
        }
        if ($initials === '' || $authorName === 'Not Found') {
            $initials = '—';
        }
    @endphp

    <article class="pro-article">

        {{-- Cover --}}
        <div class="pro-article-cover">
            <div class="position-absolute top-0 start-0 w-100 h-100"
                 style="background:linear-gradient(180deg, rgba(15,23,42,0) 50%, rgba(15,23,42,.65) 100%);"></div>
            <div class="position-absolute" style="bottom:1.5rem; left:1.75rem; right:1.75rem;">
                <span class="pro-chip mb-3"><i class="bi bi-hash"></i> Post #{{ $post->id }}</span>
                <h1 class="text-white mb-0" style="font-size:clamp(1.6rem, 4vw, 2.6rem); text-shadow:0 2px 18px rgba(0,0,0,.35);">
                    {{ $post->title }}
                </h1>
            </div>
        </div>

        {{-- Body --}}
        <div class="pro-article-body">

            {{-- Author card --}}
            <div class="pro-author-card mb-4">
                <div class="pro-author-avatar">{{ $initials }}</div>
                <div class="flex-grow-1">
                    <div class="pro-author-name">{{ $authorName }}</div>
                    <div class="pro-author-meta">
                        @if ($post->user)
                        <span><i class="bi bi-envelope"></i> {{ $post->user->email }}</span>
                        @endif
                        <span><i class="bi bi-calendar3"></i> {{ $post->created_at->toFormattedDayDateString() }}</span>
                    </div>
                </div>
                <div class="d-flex gap-2 ms-auto">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil me-1"></i> Edit
                    </a>
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash me-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>

            {{-- Description --}}
            <div class="pro-card mb-0">
                <div class="pro-card-header">
                    <i class="bi bi-card-text text-primary"></i> Post Info
                </div>
                <div class="pro-card-body">
                    <p class="pro-article-text mb-0">{{ $post->description }}</p>
                </div>
            </div>

        </div>
    </article>

    {{-- Author details card (kept original data, redesigned) --}}
    <div class="row g-4 mt-1">
        <div class="col-md-6">
            <div class="pro-card">
                <div class="pro-card-header">
                    <i class="bi bi-person-badge text-primary"></i> Author Profile
                </div>
                <div class="pro-card-body">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="pro-author-avatar">{{ $initials }}</div>
                        <div>
                            <h3 class="h6 mb-0">{{ $authorName }}</h3>
                            <small class="text-muted">Post author</small>
                        </div>
                    </div>
                    <ul class="list-unstyled mb-0 d-grid gap-2">
                        <li class="d-flex align-items-center gap-2">
                            <span class="pro-icon-btn"><i class="bi bi-person"></i></span>
                            <span><strong>Name:</strong> {{ $authorName }}</span>
                        </li>
                        @if ($post->user)
                        <li class="d-flex align-items-center gap-2">
                            <span class="pro-icon-btn"><i class="bi bi-envelope"></i></span>
                            <span><strong>Email:</strong> {{ $post->user->email }}</span>
                        </li>
                        @endif
                        <li class="d-flex align-items-center gap-2">
                            <span class="pro-icon-btn"><i class="bi bi-calendar3"></i></span>
                            <span><strong>Created At:</strong> {{ $post->created_at->toFormattedDayDateString() }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="pro-card h-100" style="background:var(--pro-gradient-soft);">
                <div class="pro-card-body d-flex flex-column justify-content-center text-center p-4">
                    <div class="pro-feature-icon mx-auto mb-3" style="width:60px;height:60px;font-size:1.75rem;">
                        <i class="bi bi-bookmark-star"></i>
                    </div>
                    <h3 class="h5 mb-2">Enjoying this post?</h3>
                    <p class="text-muted mb-4">Browse more stories from the library or refine this one in the editor.</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-collection me-1"></i> All Posts
                        </a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-1"></i> Edit Post
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this post?");
    }
</script>

@endsection
