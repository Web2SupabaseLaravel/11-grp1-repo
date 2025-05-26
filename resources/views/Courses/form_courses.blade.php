@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $courses->exists ? 'Edit Course' : 'Create Course' }}</h2>

    <form action="{{ $courses->exists ? route('datacourses.update', $courses->id) : route('datacourses.store') }}" method="POST">
        @csrf
        @if($courses->exists)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $courses->title) }}"
                required
            >
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                name="description"
                id="description"
                class="form-control @error('description') is-invalid @enderror"
                required
            >{{ old('description', $courses->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="teacher_id" class="form-label">Teacher ID</label>
            <input
                type="number"
                name="teacher_id"
                id="teacher_id"
                class="form-control @error('teacher_id') is-invalid @enderror"
                value="{{ old('teacher_id', $courses->teacher_id) }}"
                required
            >
            @error('teacher_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="created_at" class="form-label">Created At</label>
            <input
                type="datetime-local"
                name="created_at"
                id="created_at"
                class="form-control @error('created_at') is-invalid @enderror"
                value="{{ old('created_at', isset($courses->created_at) ? \Carbon\Carbon::parse($courses->created_at)->format('Y-m-d\TH:i') : '') }}"
                required
            >
            @error('created_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="updated_at" class="form-label">Updated At</label>
            <input
                type="datetime-local"
                name="updated_at"
                id="updated_at"
                class="form-control @error('updated_at') is-invalid @enderror"
                value="{{ old('updated_at', isset($courses->updated_at) ? \Carbon\Carbon::parse($courses->updated_at)->format('Y-m-d\TH:i') : '') }}"
                required
            >
            @error('updated_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ $courses->exists ? 'Update' : 'Create' }}</button>
        <a href="{{ route('datacourses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection