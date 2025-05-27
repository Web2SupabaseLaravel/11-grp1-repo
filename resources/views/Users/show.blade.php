@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Details</h1>

    <div class="card p-4">
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i') }}</p>
        <p><strong>Updated At:</strong> {{ $user->updated_at->format('Y-m-d H:i') }}</p>
    </div>

    <a href="{{ route('datausers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
