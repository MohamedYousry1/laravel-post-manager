@extends('layouts.app')

@section('title') Edit @endsection
@section('content')
<form action="{{ route('posts.update',$post->id) }}" method="POST">
    <!-- laravel force while using FORMS we should use @csrf or get error 419 PAGE EXPIRED, use it to protect from csrf attack -->
    @csrf
    @method('PUT') <!-- we use this Directive to spoof or cheat these request method form  -->
    <div class="mt-4">
        @if(session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
        @endif
    </div>
    <div class="mt-4">
        <label class="form-label">title</label>
        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}" name="title">
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mt-4">
        <label class="form-label">description</label>
        <textarea id="description" class="form-control @error('description') is-invalid @enderror" rows="3" name="description">{{ $post->description }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mt-4 mb-4">
        <label class="form-label">Post Creator</label>
        <select id="postCreator" class="form-control @error('post_creator') is-invalid @enderror" name="post_creator">
            @foreach ($users as $user)
            <option @selected($post->user_id == $user->id) value="{{ $user->id }}"> {{$user->name}} </option>
            @endforeach
        </select>
        @error('post_creator')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button id="updateBtn" class="btn btn-primary">Update</button>
</form>

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