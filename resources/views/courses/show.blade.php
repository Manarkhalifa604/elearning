<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $course->title }}</title>
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>

    @include('header')
    <body style="font-family: 'Outfit', sans-serif;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset($course->image)}}" class="img-fluid rounded shadow">
                
                </div>
                <div class="col-lg-6 m-2" style="max-width:420px">
                    <h1 style="font-size: 45px; font-weight: 600;">{{ $course->title }}</h1>
                    <span class="badge mb-2" style="background-color: #E2FDE7; color: #6D937A;">{{ $course->level }}</span>
                    <p class="jus">{{ $course->courses_description }}</p>

                    <p>
                        <img src="{{ asset('images/icons/lessons.svg') }}" alt="lessons" width="20" class="me-1">
                        {{ $course->lessons }} Lessons
                    </p>
                    <p>
                        <img src="{{ asset('images/icons/clock.svg') }}" alt="lessons" width="20" class="me-1">
                        {{ $course->duration }}
                    </p>
                    <p>
                        <img src="{{ asset('images/icons/students.svg') }}" alt="lessons" width="20" class="me-1">
                        {{ $course->students }} Students
                    </p>
                
                     <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                            @csrf

                        <button class="btn" style="background-color: #614DED; color: white;">
                            Enroll Now
                        </button>
                    </form>
                </div>
            </div>
            <hr class="my-5">

            <div>
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <button class="nav-link active"
                                data-bs-toggle="tab"
                                data-bs-target="#about">
                            About Course
                        </button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link"
                                data-bs-toggle="tab"
                                data-bs-target="#content">
                            Course Content
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- About -->
                    <div class="tab-pane fade show active" id="about">
                        <div class="row">

                            <div class="col-lg-8">

                                <p>{{ $course->about }}</p>

                                <h5 class="mt-4 mb-3">
                                    You will learn:
                                </h5>

                                <ul class="list-unstyled">
                                    @foreach (explode("\n",$course->what_you_will_learn) as $item)
                                        @if(trim($item) != '')
                                            <li class="mb-2">
                                                ✔️ {{ $item }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                            </div>
                            <div class="col-lg-4">

                                <div class="card shadow-sm">

                                    <div class="card-body">

                                        <h5>Instructor</h5>

                                        <div class="d-flex align-items-center mt-3">

                                            <img src="{{ asset($course->instructor_image) }}"
                                                width="60"
                                                height="60"
                                                class="rounded-circle me-3"
                                                alt="{{ $course->instructor_name }}">

                                            <div>

                                                <h6 class="mb-0">
                                                    {{ $course->instructor_name }}
                                                </h6>

                                                <small class="text-muted">
                                                    {{ $course->instructor_job }}
                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Course Content -->
                     
                    <div class="tab-pane fade" id="content">

                        <div class="list-group">
                            
                            @foreach(explode("\n", $course->course_content) as $lesson)
                                 @if(trim($lesson) != '')
                                    <div class="list-group-item">
                                        Lesson {{ $loop->iteration }} - {{ $lesson }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
        
                    </div>
                        
                </div>
            </div>
        </div>
        @include('footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>