<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        nav, .navbar, header { display: none !important; }
        body { background-color: #f1f5f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { min-height: 100vh; background-color: #0f172a; color: #fff; }
        .sidebar .nav-link { color: #94a3b8; padding: 12px 20px; font-weight: 500; transition: all 0.2s; border-radius: 8px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background-color: #4f46e5; }
        
        .stat-card { 
            border: none; border-radius: 16px; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04); 
            background-color: #fff; padding: 24px !important;
            transition: transform 0.3s ease;
        }
        .stat-card:hover { transform: translateY(-5px); }
        .stat-card h3 { font-size: 32px; font-weight: 700; margin-bottom: 0; color: #0f172a; }

        .icon-box { width: 52px; height: 52px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 22px; }
        .icon-blue { background-color: #e0e7ff; color: #4f46e5; }
        .icon-green { background-color: #dcfce7; color: #16a34a; }
        .icon-purple { background-color: #f3e8ff; color: #9333ea; }
        .icon-orange { background-color: #ffedd5; color: #ea580c; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
      
        <div class="col-md-3 col-lg-2 sidebar p-3 d-flex flex-column justify-content-between">
            <div>
                <a href="{{ route('index') }}" class="text-decoration-none">
                    <h4 class="fw-bold px-3 py-2 text-white m-0">EduLearn</h4>
                </a>
                <hr class="text-secondary mb-4">

                <ul class="nav nav-pills flex-column gap-2">
                    
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                            <i class="fa-solid fa-chart-line me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('index') }}" class="nav-link ">
                            <i class="fa-solid fa-solid fa-house me-2"></i> Home
                        </a>
                    </li>
                </ul>
            </div>

            
            <div class="pt-3 border-top border-secondary">
                <a href="{{ route('logout') }}" class="nav-link text-danger">
                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                </a>
            </div>
        </div>

       
        <div class="col-md-9 col-lg-10 p-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0 text-dark">Dashboard Overview</h3>
            </div>

            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

          
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small fw-bold text-uppercase d-block mb-1">Total Courses</span>
                                <h3>{{ $totalCourses ?? 0 }}</h3>
                            </div>
                            <div class="icon-box icon-blue"><i class="fa-solid fa-book-open"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small fw-bold text-uppercase d-block mb-1">Total Students</span>
                                <h3>{{ $totalStudents ?? 0 }}</h3>
                            </div>
                            <div class="icon-box icon-green"><i class="fa-solid fa-user-graduate"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small fw-bold text-uppercase d-block mb-1">Registrations</span>
                                <h3>{{ $totalRegistrations ?? 0 }}</h3>
                            </div>
                            <div class="icon-box icon-purple"><i class="fa-solid fa-pen-to-square"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small fw-bold text-uppercase d-block mb-1">Instructors</span>
                                <h3>{{ $totalInstructors ?? 0 }}</h3>
                            </div>
                            <div class="icon-box icon-orange"><i class="fa-solid fa-chalkboard-user"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card border-0 shadow-sm rounded-4 p-4 mt-2">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0 text-dark">Student Registrations</h5>
                </div>
                
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr class="text-muted">
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Course Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enrollments ?? [] as $enrollment)
                                <tr>
                                    <td><span class="badge bg-light text-dark border">#{{ $enrollment->user_id ?? $enrollment->id }}</span></td>
                                    <td class="fw-semibold">{{ $enrollment->user->name ?? 'N/A' }}</td>
                                    <td class="text-primary fw-semibold">{{ $enrollment->course->title ?? $enrollment->course->name ?? 'N/A' }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                           
                                            <a href="#" class="btn btn-sm btn-outline-warning rounded-3" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </a>

                                           
                                            <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this registration?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" title="Delete">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-5">
                                        <i class="fa-solid fa-folder-open fa-3x mb-3 d-block text-secondary"></i>
                                        No student registrations found yet.
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
</body>
</html>