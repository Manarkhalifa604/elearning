<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { min-height: 100vh; background-color: #0f172a; color: #fff; }
        .sidebar .nav-link { color: #94a3b8; padding: 12px 20px; font-weight: 500; transition: all 0.2s; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background-color: #4f46e5; border-radius: 8px; }
        .stat-card { border: none; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.03); background-color: #fff; }
        .stat-card h3 { font-size: 28px; font-weight: bold; margin-bottom: 0; color: #1e293b; }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">
       
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar p-3 d-flex flex-column justify-content-between">
            <div>
                <!-- Brand / Logo Name -->
                <h4 class="fw-bold px-3 py-2 text-white m-0">EduLearn</h4>
                <hr class="text-secondary">
            </div>

            <!-- Logout Button Only -->
            <div class="mb-3">
                @if(Route::has('logout'))
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="#" class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                        </a>
                    </form>
                @else
                    <a href="/logout" class="nav-link text-danger">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                    </a>
                @endif
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0">Dashboard</h3>
                <!-- Quick action button dynamically routed -->
                <a href="{{ Route::has('courses.create') ? route('courses.create') : '/courses' }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus me-1"></i> Add New Course
                </a>
            </div>

            <!-- Dynamic Statistics Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card stat-card p-3">
                        <span class="text-muted small fw-bold">Total Courses</span>
                        <h3>{{ $totalCourses ?? 0 }}</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3">
                        <span class="text-muted small fw-bold">Total Students</span>
                        <h3>{{ $totalStudents ?? 0 }}</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3">
                        <span class="text-muted small fw-bold">Total Registrations</span>
                        <h3>{{ $totalRegistrations ?? 0 }}</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card p-3">
                        <span class="text-muted small fw-bold">Total Instructors</span>
                        <h3>{{ $totalInstructors ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <!-- Dynamic Table for Latest Courses -->
            <div class="card border-0 shadow-sm rounded-3 p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Latest Courses</h5>
                </div>
                
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr class="text-muted">
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestCourses ?? [] as $index => $course)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-semibold">{{ $course->title ?? $course->name ?? 'Untitled Course' }}</td>
                                    <td class="text-muted small">{{ Str::limit($course->description ?? $course->courses_description ?? 'No description available', 40) }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!-- View / Edit Button -->
                                            <a href="{{ Route::has('courses.show') ? route('courses.show', $course->id) : '/courses/' . $course->id }}" class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fa-solid fa-eye"></i> View
                                            </a>

                                            <!-- Delete Button (Safe fallback if delete route isn't defined yet) -->
                                            @if(Route::has('courses.destroy'))
                                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fa-solid fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            @else
                                                <button type="button" class="btn btn-sm btn-outline-secondary" disabled title="Delete function not connected in backend">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i class="fa-solid fa-box-open fa-2x mb-2 d-block"></i>
                                        No courses available in the database yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('footer')
</body>
</html>