<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizApiController extends Controller
{
    public function index()
    {
        return response()->json(Quiz::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lesson_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'total_mark' => 'required|integer',
        ]);

        $quiz = Quiz::create($validated);
        return response()->json($quiz, 201);
    }

    public function show($qid)
    {
        $quiz = Quiz::find($qid);

        if (!$quiz) {
            return response()->json(['message' => 'Quiz not found'], 404);
        }

        return response()->json($quiz, 200);
    }

    public function update(Request $request, $qid)
    {
        $quiz = Quiz::find($qid);

        if (!$quiz) {
            return response()->json(['message' => 'Quiz not found'], 404);
        }

        $validated = $request->validate([
            'lesson_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'total_mark' => 'required|integer',
        ]);

        $quiz->update($validated);
        return response()->json($quiz, 200);
    }

    public function destroy($qid)
    {
        $quiz = Quiz::find($qid);

        if (!$quiz) {
            return response()->json(['message' => 'Quiz not found'], 404);
        }

        $quiz->delete();
        return response()->json(['message' => 'Quiz deleted'], 200);
    }
}
