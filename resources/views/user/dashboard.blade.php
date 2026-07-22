<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

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

        <div class="col-md-4">

            <div class="card course-card shadow-sm">

                <img src="{{ asset('images/php.jpg') }}" class="card-img-top">

                <div class="card-body">

                    <h5>PHP Course</h5>

                    <p class="text-muted">
                        Continue your learning.
                    </p>

                    <a href="#" class="btn btn-primary w-100">
                        Continue
                    </a>

                </div>

            </div>

        </div>



        <div class="col-md-4">

            <div class="card course-card shadow-sm">

                <img src="{{ asset('images/laravel.jpg') }}" class="card-img-top">

                <div class="card-body">

                    <h5>Laravel Course</h5>

                    <p class="text-muted">
                        Continue your learning.
                    </p>

                    <a href="#" class="btn btn-primary w-100">
                        Continue
                    </a>

                </div>

            </div>

        </div>



        <div class="col-md-4">

            <div class="card course-card shadow-sm">

                <img src="{{ asset('images/js.jpg') }}" class="card-img-top">

                <div class="card-body">

                    <h5>JavaScript Course</h5>

                    <p class="text-muted">
                        Continue your learning.
                    </p>

                    <a href="#" class="btn btn-primary w-100">
                        Continue
                    </a>

                </div>

            </div>

        </div>

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

</body>
</html>