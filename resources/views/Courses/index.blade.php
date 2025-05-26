@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Courses List</h1>

    <a href="{{ route('datacourses.create') }}" class="btn btn-success mb-3">Create New Course</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Teacher ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->teacher_id }}</td>
                    <td>
                        <a href="{{ route('datacourses.show', $course->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('datacourses.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('datacourses.destroy', $course->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this course?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No courses found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

