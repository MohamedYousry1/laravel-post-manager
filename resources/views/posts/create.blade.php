@extends('layouts.app')

@section('title') Create @endsection
@section('content')

<form action="{{ route('posts.store') }}" method="POST">
    <!-- laravel force while using FORMS we should use @csrf or get error 419 PAGE EXPIRED, use it to protect from csrf attack -->
    @csrf
    <div class="mt-4">
        <label class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mt-4">
        <label class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description">{{ old('description') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mt-4 mb-4">
        <label class="form-label">Post Creator</label>
        <select class="form-control  @error('post_creator') is-invalid @enderror" name="post_creator">
            @foreach ($users as $user)
            <option value="{{ $user->id }}"> {{$user->name}} </option>
            @endforeach
        </select>
        @error('post_creator')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button class="btn btn-success">Submit</button>
</form>

@endsection