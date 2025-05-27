@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $user->exists ? 'Edit User' : 'Create User' }}</h2>

    <form action="{{ $user->exists ? route('datausers.update', $user->id) : route('datausers.store') }}" method="POST">
        @csrf
        @if($user->exists)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}"
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}"
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @if(!$user->exists)
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control @error('password') is-invalid @enderror"
                required
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-control"
                required
            >
        </div>
        @else
        <div class="mb-3">
            <label for="password" class="form-label">Password (leave blank to keep current)</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control @error('password') is-invalid @enderror"
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-control"
            >
        </div>
        @endif

        <button type="submit" class="btn btn-primary">{{ $user->exists ? 'Update' : 'Create' }}</button>
        <a href="{{ route('datausers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
