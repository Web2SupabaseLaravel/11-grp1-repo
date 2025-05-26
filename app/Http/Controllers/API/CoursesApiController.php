<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesApiController extends Controller
{
    public function index()
    {
        return response()->json(Course::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|integer',
        ]);

        $course = Course::create($validated);

        return response()->json([
            'message' => 'Course created successfully',
            'course' => $course,
        ], 201);
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return response()->json($course);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|integer',
        ]);

        $course = Course::findOrFail($id);
        $course->update($validated);

        return response()->json([
            'message' => 'Course updated successfully',
            'course' => $course,
        ]);
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json([
            'message' => 'Course deleted successfully',
        ], 204);
    }
}
