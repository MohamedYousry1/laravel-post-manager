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
        Mohamed Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">Name: Mohamed</h5>
        <p class="card-text">Email: mohamedyo44@test.com</p>
        <p class="card-text">Created At: Thursday 14th of may 2026</p>
    </div>
</div>
@endsection
