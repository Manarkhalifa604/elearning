<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fb;
        }

        .welcome{
            background:#614DED;
            color:white;
            border-radius:20px;
            padding:35px;
        }

        .card{
            border:none;
            border-radius:18px;
        }

        .stat-card{
            text-align:center;
            padding:25px;
        }

        .course-card img{
            height:170px;
            object-fit:cover;
        }
    </style>

</head>
@include('header')
<body>
<div class="container py-5">

    <!-- Welcome -->

    <div class="welcome mb-5">

        <h2>Welcome Back 👋</h2>

        <h4>{{ $user->name }}</h4>

        <p class="mb-0">
            Keep learning and continue your journey.
        </p>

    </div>

    <!-- My Courses -->

    <h3 class="mb-4">
        My Courses
    </h3>

    <div class="row g-4">

        @foreach($user->courses as $course)

            <div class="col-md-4">

                <div class="card course-card shadow-sm">

                    <img src="{{ asset($course->image) }}" class="card-img-top">

                    <div class="card-body">

                        <h5>{{ $course->title }}</h5>

                        <p class="text-muted">
                            {{ $course->courses_description }}
                        </p>

                        <a href="{{ route('courses.show', $course->id) }}"
                            class="btn btn-primary w-100">
                            Continue
                        </a>

                    </div>

                </div>

            </div>

        @endforeach

        @if($user->courses->count() == 0)

            <div class="col-12">

                <div class="alert alert-info">
                    You haven't enrolled in any course yet.
                </div>

            </div>

        @endif

    </div>



    <!-- Profile -->

    <div class="card shadow-sm mt-5">

        <div class="card-body">

            <h3 class="mb-4">
                Profile
            </h3>

            <p>
                <strong>Name:</strong>
                {{ $user->name }}
            </p>

            <p>
                <strong>Role:</strong>
                {{ $user->role }}
            </p>

            <a href="#" class="btn btn-outline-primary">
                Edit Profile
            </a>

        </div>

    </div>



    <div class="mt-5 text-end">

        <a href="/logout" class="btn btn-danger">
            Logout
        </a>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
@include('footer')
</body>
</html>