@extends('layouts.app')

@section('title') Show @endsection
@section('content')

<div class="card mt-4">
    <div class="card-header">
        Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$post['title']}}</h5>
        <p class="card-text">{{$post['description']}}</p>
    </div>
</div>
<div class="card mt-4">
    <div class="card-header">
        {{ $user['name'] }} Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$user['name']}}</h5>
        <p class="card-text">{{$user['email']}}</p>
        <p class="card-text">{{$post['created_at']}}</p>
    </div>
</div>
@endsection
