@extends('layouts.app')

@section('title', 'All Posts — Yosry Blog')

@section('content')

{{-- Page header --}}
<header class="pro-page-header">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <span class="pro-eyebrow mb-2"><i class="bi bi-collection"></i> Posts Library</span>
                <h1>All Posts</h1>
                <p class="pro-subtitle">Browse, read, edit or remove posts from your blog studio.</p>
            </div>
            <a href="{{ route('posts.create') }}" class="btn btn-success btn-lg">
                <i class="bi bi-plus-lg me-1"></i> Create Post
            </a>
        </div>
    </div>
</header>

<div class="container pb-5">

    @if ($posts->count() > 0)
        {{-- Card grid --}}
        <div class="pro-post-grid">
            @php $counter = 0; @endphp
            @foreach ($posts as $post)
                @php
                    // Deterministic cover image based on post id (no logic change — pure presentation)
                   
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

                <article class="pro-post-card">
                    <a href="{{ route('posts.show', $post->id) }}" class="pro-post-cover">
                        <span class="pro-post-id"># {{ ++$counter}} </span>  <!-- relogic -->
                    </a>
                    <div class="pro-post-body">
                        <h2 class="pro-post-title">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-reset">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <div class="pro-post-meta">
                            <span class="pro-avatar">{{ $initials }}</span>
                            <span><i class="bi bi-person me-1"></i>{{ $authorName }}</span>
                            <span><i class="bi bi-calendar3 me-1"></i>{{ $post->created_at->toFormattedDateString() }}</span>
                        </div>

                        <p class="pro-post-description">{{ $post->description }}</p>

                        <div class="pro-post-actions">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye me-1"></i> View
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil me-1"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" onsubmit="return confirmDelete()" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        @if ($posts->hasPages())
            {{ $posts->links('vendor.pagination.pro') }}
        @endif

    @else
        {{-- Empty state --}}
        <div class="pro-empty">
            <div class="pro-empty-icon"><i class="bi bi-journal-x"></i></div>
            <h2 class="h4 mb-2">No posts yet</h2>
            <p class="text-muted mb-4">Your blog library is empty. Create your very first post to get started.</p>
            <a href="{{ route('posts.create') }}" class="btn btn-success btn-lg">
                <i class="bi bi-plus-lg me-1"></i> Create Post
            </a>
        </div>
    @endif

</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this post?");
    }
</script>

@endsection
