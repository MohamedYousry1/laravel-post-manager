@extends('layouts.app')

@section('title') Show @endsection
@section('content')

<div class="card mt-4">
    <div class="card-header">
        Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->description}}</p>
    </div>
</div>
<div class="card mt-4">
    <div class="card-header">
    {{$post->user ? $post->user->name : 'Not Found'}} Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">Name: {{$post->user ? $post->user->name : 'Not Found'}}</h5>
        <p class="card-text">Email: {{$post->user ? $post->user->email : 'Not Found'}}</p>
        <!-- laravel uses carbon pakage to call toFormattedDayDateString(). -->
        <p class="card-text">Created At: {{$post->created_at->toFormattedDayDateString()}}</p>
    </div>
</div>
@endsection
