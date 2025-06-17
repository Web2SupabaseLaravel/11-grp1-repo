<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index()
    {
         $courses = Course::all(); // تحميل كل الكورسات
    return view('courses.index', compact('courses')); // تمرير $courses للعرض
    }

    public function create()
    {
        $courses = new Course();  // لازم يكون اسم المتغير هو $courses
    $route = 'datacourses.store';
    $method = 'post';
    $submitButton = 'Submit';

    return view('courses.form_courses', compact('courses', 'route', 'method', 'submitButton'));
     return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|integer',
        ]);

        $course = new Course();
        $course->title = $validated['title'];
        $course->description = $validated['description'];
        $course->teacher_id = $validated['teacher_id'];
        $course->save();

        return redirect()->route('datacourses.index')->with('success', 'Course created successfully');
    }

    public function show($id)
    {
       $course = Course::findOrFail($id);
    return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id); // تحميل كورس واحد
     return view('courses.edit', compact('course'));// تمرير $courses
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|integer',
        ]);

        $course->title = $validated['title'];
        $course->description = $validated['description'];
        $course->teacher_id = $validated['teacher_id'];
        $course->save();

        return redirect()->route('datacourses.index')->with('success', 'Course updated successfully');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

          return view('courses.delete', compact('course')); 
    }

}
