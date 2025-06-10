<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReportController extends Controller
{
public function index(){

    $report =Report::all();
    return response()->json($report, 200);
}


public function store(Request $request){
    $report =Report::create(
    [
    'title'=>$request->title,
    'content'=>$request->content
    ]
);
return response()->json($report, 201);

}

public function update(Request $request,$id){
    $report =Report::findOrFail($id);
    $report->update($request->all());
return response()->json($report, 200);

}

public function show($id){
$report =Report::findOrFail($id);
return response()->json($report, 200);


}

public function destroy($id){
    $report =Report::findOrFail($id);
    $report->delete();
    return response()->json(null, 204);


    }




    public function dashboard()
    {
        $topCourses = DB::table('enrollments')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->select('courses.title', DB::raw('COUNT(enrollments.id) as students'))
            ->groupBy('courses.title')
            ->orderByDesc('students')
            ->limit(5)
            ->get();

        $enrollmentTrends = DB::table('enrollments')
            ->select(DB::raw("TO_CHAR(created_at, 'YYYY-MM') as month"), DB::raw('COUNT(*) as enrollments'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

            $totalUsers = DB::table('users')->count();
        $totalCourses = DB::table('courses')->count();

        return response()->json([
            'top_courses' => $topCourses,
            'enrollment_trends' => $enrollmentTrends,
            'total_users' => $totalUsers,
            'total_courses' => $totalCourses,
        ]);
    }

}