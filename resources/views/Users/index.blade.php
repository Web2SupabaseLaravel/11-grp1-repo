@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users List</h1>

    <a href="{{ route('datausers.create') }}" class="btn btn-success mb-3">Create New User</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                @if ($user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('datausers.show', $user->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('datausers.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <form action="{{ route('datausers.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @empty
                <tr><td colspan="4" class="text-center">No users found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
