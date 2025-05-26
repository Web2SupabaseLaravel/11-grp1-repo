@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Course Details</h1>

    <div class="card p-4">
        <p><strong>ID:</strong> {{ $course->id }}</p>
        <p><strong>Title:</strong> {{ $course->title }}</p>
        <p><strong>Description:</strong> {{ $course->description }}</p>
        <p><strong>Teacher ID:</strong> {{ $course->teacher_id }}</p>
        <p><strong>Created At:</strong> {{ $course->created_at->format('Y-m-d H:i') }}</p>
        <p><strong>Updated At:</strong> {{ $course->updated_at->format('Y-m-d H:i') }}</p>
    </div>

    <a href="{{ route('datacourses.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
