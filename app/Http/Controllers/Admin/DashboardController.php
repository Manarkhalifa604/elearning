<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCourses = Course::count();
        $totalStudents = User::where('role', 'student')->orWhere('role', 'user')->count();
        $totalRegistrations = Enrollment::count();

        $totalInstructors = Course::whereNotNull('instructor_name')
            ->distinct('instructor_name')
            ->count('instructor_name');

        $enrollments = Enrollment::with(['user', 'course'])->get();

        return view('admin.dashboard', compact(
            'totalCourses',
            'totalStudents',
            'totalRegistrations',
            'totalInstructors',
            'enrollments'
        ));
    }

    public function destroyEnrollment($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return redirect()->back()->with('success', 'Registration deleted successfully!');
    }
}