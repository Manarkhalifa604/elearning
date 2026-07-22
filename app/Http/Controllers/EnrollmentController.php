<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enroll($id)
    {
        $user = User::find(session('user_id'));

        if (!$user) {
            return redirect('/login');
        }

        $user->courses()->syncWithoutDetaching($id);

        return redirect()->back()->with('success', 'Enrolled Successfully');
    }
}
$totalCourses = Course::count();