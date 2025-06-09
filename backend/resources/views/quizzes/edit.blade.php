@extends('layouts.app')

@section('content')
    <h1>Edit Quiz</h1>

    <form action="{{ route('quizzes.update', $quiz->qid) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Lesson ID:</label>
        <input type="number" name="lesson_id" value="{{ $quiz->lesson_id }}" required><br>

        <label>Title:</label>
        <input type="text" name="title" value="{{ $quiz->title }}" required><br>

        <label>Total Mark:</label>
        <input type="number" name="total_mark" value="{{ $quiz->total_mark }}" required><br>

        <button type="submit">Update</button>
    </form>
@endsection
