@extends('layouts.app')

@section('content')
    <h1>Create Quiz</h1>

    <form action="{{ route('quizzes.store') }}" method="POST">
        @csrf
        <label>Lesson ID:</label>
        <input type="number" name="lesson_id" required><br>

        <label>Title:</label>
        <input type="text" name="title" required><br>

        <label>Total Mark:</label>
        <input type="number" name="total_mark" required><br>

        <button type="submit">Create</button>
    </form>
@endsection
