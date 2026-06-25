@extends('layouts.app')

@section('title') Index @endsection
@section('content') <!-- body content -->
<div class="text-center mt-4">
    <a href="{{ route('posts.create') }}" class="btn btn-success w-100 w-sm-auto">Create Post</a>
</div>

<div class="table-responsive mt-4">
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th scope="col" class="d-none d-md-table-cell">ID</th>
                <th scope="col">Title</th>
                <th scope="col" class="d-none d-lg-table-cell">Posted By</th>
                <th scope="col" class="d-none d-md-table-cell">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td class="d-none d-md-table-cell">{{ $post->id }}</td>
                <td class="text-truncate" style="max-width: 180px;">{{ $post->title }}</td>
                <!-- created_at is a timestamp column that Laravel automatically converts into a Carbon object so you can format and compare dates easily. -->
                <!-- Carbon is an external PHP package for date and time manipulation. Laravel uses it to make working with datetime values easier. -->
                <td class="d-none d-lg-table-cell">{{ $post->user ? $post->user->name : 'Not Found' }}</td>
                <td class="d-none d-md-table-cell">{{ $post->created_at->toFormattedDateString() }}</td>
                <td>
                    <div class="d-flex flex-column flex-sm-row gap-1">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger w-100">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this post?");
    }
</script>
@endsection