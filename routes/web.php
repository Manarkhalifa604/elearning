<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.check');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::post('/courses/{id}/enroll', [EnrollmentController::class, 'enroll'])
    ->name('courses.enroll');


Route::get('/dashboard', function () {
    if (session('role') === 'admin' || (auth()->check() && auth()->user()->role === 'admin')) {
        return redirect()->route('admin.dashboard');
    }

    return redirect('/user/dashboard');
})->name('dashboard');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');


Route::delete('/admin/enrollments/{id}', [DashboardController::class, 'destroyEnrollment'])
    ->name('admin.enrollments.destroy');


Route::get('/user/dashboard', function () {
    $user = User::find(session('user_id'));
    return view('user.dashboard', compact('user'));
});