@extends('layouts.app')

@section('content')
    <h1>All Quizzes</h1>
    <a href="{{ route('quizzes.create') }}">Create New Quiz</a>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Lesson ID</th>
            <th>Title</th>
            <th>Total Mark</th>
            <th>Actions</th>
        </tr>
        @foreach ($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->qid }}</td>
                <td>{{ $quiz->lesson_id }}</td>
                <td>{{ $quiz->title }}</td>
                <td>{{ $quiz->total_mark }}</td>
                <td>
                    <a href="{{ route('quizzes.edit', $quiz->qid) }}">Edit</a>
                    <form action="{{ route('quizzes.destroy', $quiz->qid) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
