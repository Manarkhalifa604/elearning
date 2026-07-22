<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

use App\Http\Controllers\HomeController;

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


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin');

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware('user');