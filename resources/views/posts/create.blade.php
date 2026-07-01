@extends('layouts.app')

@section('title', 'Create Post — Yosry Blog')

@section('content')

<div class="container py-4">

    {{-- Back link --}}
    <a href="{{ route('posts.index') }}" class="btn btn-ghost btn-sm mb-4">
        <i class="bi bi-arrow-left me-1"></i> Back to all posts
    </a>

    <div class="pro-form-card pro-animate">

        <div class="pro-form-header">
            <div class="d-flex align-items-center gap-3">
                <span class="pro-feature-icon mb-0" style="width:54px;height:54px;font-size:1.5rem;">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <div>
                    <h1>Create a New Post</h1>
                    <p>Fill in the details below and publish your story to the blog library.</p>
                </div>
            </div>
        </div>

        <div class="pro-form-body">

            <form action="{{ route('posts.store') }}" method="POST">
                {{-- Laravel forces @csrf on forms to prevent 419 PAGE EXPIRED (CSRF protection) --}}
                @csrf

                <div class="mb-4">
                    <label class="form-label" for="title">
                        <i class="bi bi-type"></i> Title
                    </label>
                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Give your post a catchy title (max 50 characters)">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="description">
                        <i class="bi bi-card-text"></i> Description
                    </label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" rows="5" name="description" placeholder="Write the body of your post here (max 255 characters)">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="post_creator">
                        <i class="bi bi-person"></i> Post Creator
                    </label>
                    <select id="post_creator" class="form-select @error('post_creator') is-invalid @enderror" name="post_creator">
                        <option value="" disabled selected>— Select an author —</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @selected(old('post_creator') == $user->id)> {{ $user->name }} </option>
                        @endforeach
                    </select>
                    @error('post_creator')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="pro-divider">

                <div class="d-flex flex-wrap gap-2 justify-content-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg me-1"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-send me-1"></i> Publish Post
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>

@endsection
