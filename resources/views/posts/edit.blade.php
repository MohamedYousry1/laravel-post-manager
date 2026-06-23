@extends('layouts.app')

@section('title') Edit @endsection
@section('content')
<form action="{{ route('posts.update',$post->id) }}" method="POST">
    <!-- laravel force while using FORMS we should use @csrf or get error 419 PAGE EXPIRED, use it to protect from csrf attack -->
    @csrf
    @method('PUT') <!-- we use this Directive to spoof or cheat these request method form  -->
    <div class="mt-4">
        <label class="form-label">title</label>
        <input type="text" class="form-control" value="{{ $post->title }}" name="title">
    </div>
    <div class="mt-4">
        <label class="form-label">description</label>
        <textarea class="form-control" rows="3" name="description">{{ $post->description }}</textarea>
    </div>
    <div class="mt-4 mb-4">
        <label class="form-label">Post Creator</label>
        <select class="form-control" name="post_creator">
            @foreach ($users as $user)
            <!-- <option @if($user->id == $post->user_id) selected @endif  value="{{ $user->id }}"> {{$user->name}} </option> -->
            <option @selected($post->user_id == $user->id) value="{{ $user->id }}"> {{$user->name}} </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection