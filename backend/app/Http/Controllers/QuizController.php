<?php
// app/Http/Controllers/QuizController.php
namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lesson_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'total_mark' => 'required|integer',
        ]);

        Quiz::create($request->all());
        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }

    public function edit($qid)
    {
        $quiz = Quiz::findOrFail($qid);
        return view('quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, $qid)
    {
        $request->validate([
            'lesson_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'total_mark' => 'required|integer',
        ]);

        $quiz = Quiz::findOrFail($qid);
        $quiz->update($request->all());

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy($qid)
    {
        $quiz = Quiz::findOrFail($qid);
        $quiz->delete();

        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
    }
}
