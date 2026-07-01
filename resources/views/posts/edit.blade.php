@extends('layouts.app')

@section('title', 'Edit Post — Yosry Blog')

@section('content')

<div class="container py-4">

    {{-- Back link --}}
    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-ghost btn-sm mb-4">
        <i class="bi bi-arrow-left me-1"></i> Back to post
    </a>

    <div class="pro-form-card pro-animate">

        <div class="pro-form-header">
            <div class="d-flex align-items-center gap-3">
                <span class="pro-feature-icon accent mb-0" style="width:54px;height:54px;font-size:1.5rem;">
                    <i class="bi bi-pencil"></i>
                </span>
                <div>
                    <h1>Edit Post <span class="pro-chip pro-chip-muted ms-1">#{{ $post->id }}</span></h1>
                    <p>Update the title, description or author. The button enables when something changes.</p>
                </div>
            </div>
        </div>

        <div class="pro-form-body">

            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                {{-- Laravel forces @csrf on forms to prevent 419 PAGE EXPIRED (CSRF protection) --}}
                @csrf
                {{-- @method directive spoofs the request method to PUT --}}
                @method('PUT')

                @if(session('info'))
                    <div class="alert alert-warning mb-4">
                        <i class="bi bi-exclamation-triangle"></i>
                        <span>{{ session('info') }}</span>
                    </div>
                @endif

                <div class="mb-4">
                    <label class="form-label" for="title">
                        <i class="bi bi-type"></i> Title
                    </label>
                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}" name="title">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="description">
                        <i class="bi bi-card-text"></i> Description
                    </label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" rows="5" name="description">{{ $post->description }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="postCreator">
                        <i class="bi bi-person"></i> Post Creator
                    </label>
                    <select id="postCreator" class="form-select @error('post_creator') is-invalid @enderror" name="post_creator">
                        @foreach ($users as $user)
                            <option @selected($post->user_id == $user->id) value="{{ $user->id }}"> {{ $user->name }} </option>
                        @endforeach
                    </select>
                    <div class="form-hint">Choose the user this post belongs to.</div>
                    @error('post_creator')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="pro-divider">

                <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="bi bi-info-circle me-1"></i>
                        The Update button stays disabled until a field changes.
                    </small>
                    <div class="d-flex gap-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-lg me-1"></i> Cancel
                        </a>
                        <button id="updateBtn" class="btn btn-primary">
                            <i class="bi bi-check2-circle me-1"></i> Update Post
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>

<script>
    const title = document.getElementById('title');
    const description = document.getElementById('description');
    const postCreator = document.getElementById('postCreator');
    const button = document.getElementById('updateBtn');
    const originalTitle = title.value;
    const originalDescription = description.value;
    const originalPostCreator = postCreator.value;

    function checkChanges() {
        const unchanged =
            title.value === originalTitle &&
            description.value === originalDescription &&
            postCreator.value === originalPostCreator;
        button.disabled = unchanged;
    }

    title.addEventListener('input', checkChanges);
    description.addEventListener('input', checkChanges);
    postCreator.addEventListener('change', checkChanges);
    checkChanges(); // run once on page load
</script>

@endsection