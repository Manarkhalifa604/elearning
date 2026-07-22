<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <title>Document</title>
   <style>
        .course-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05) !important;
        }
        
        .course-card:hover {
            transform: scale(0.97); 
            box-shadow: 0 .25rem .5rem rgba(0,0,0,.1) !important;
        }

        .img-container {
            position: relative;
            overflow: hidden;
            height: 160px;
        }

        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .img-container::before {
            content: "•••";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            color: white;
            font-size: 28px;
            letter-spacing: 6px;
            font-weight: bold;
            text-shadow: 0 2px 6px rgba(0,0,0,0.8);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .img-container::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .course-card:hover .img-container img {
            transform: scale(1.05);
        }

        .course-card:hover .img-container::before,
        .course-card:hover .img-container::after {
            opacity: 1;
        }
    </style>
</head>
<body class="bg-light text-dark">
<!-- header -->
 @include('header')
<!-- home  -->
 <main>
  <div style="
    background-image: url('{{ asset('/images/5d692a6b-e9eb-4ba4-b68d-677c05130701.jpg') }}');
    background-size: cover;
    background-position: center;
    width: 100vw;
    height: 100vh;">
  </div>
  
 </main>


 <!-- course cards -->




    <div class="container py-5">
        
        <div class="mb-4">
            <h1 class="h3 fw-bold text-dark">All Courses</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="font-size: 0.9rem;">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-primary">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/courses') }}" class="text-decoration-none text-secondary">Courses</a></li>
                </ol>
            </nav>
        </div>

        <div class="row g-3 g-md-4">
            @foreach($courses as $course)
                <div class="col-6 col-md-4 col-lg-3">
                  <a href="{{ route('courses.show', $course->id) }}" class="text-decoration-none text-dark">
                    <div class="card course-card h-100 rounded-4 bg-white shadow-sm d-flex flex-column justify-content-between">
                        
                        <div>
                            <div class="img-container rounded-top-4">
                                <img src="{{ $course->image }}" alt="{{ $course->title }}">
                            </div>

                            <div class="card-body p-3">
                                <h5 class="card-title fw-bold fs-6 mb-1 text-dark">{{ $course->title }}</h5>
                                <p class="card-text text-muted fs-7 mb-3" style="font-size: 0.8rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $course->description }}
                                </p>
                                
                                <span class="badge {{ $course->level == 'Beginner' ? 'bg-success' : 'bg-warning text-dark' }} fw-semibold px-2 py-1" style="font-size: 0.75rem;">
                                    {{ $course->level }}
                                </span>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent border-0 p-3 pt-0">
                            <a href="#" class="btn w-100 py-2 fw-medium text-white shadow-sm" style="font-size: 0.9rem; background-color: #614DED; border-color: #614DED;">
                                View Course
                            </a>
                        </div>

                    </div>
                  </a>
                </div>
            @endforeach
        </div>

    </div>




<!-- footer -->
 @include('footer')


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>