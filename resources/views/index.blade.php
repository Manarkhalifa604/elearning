<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="padding-top: 70px;">
    <!-- header -->
<header class=""> 
  <nav class="navbar navbar-expand-lg bg-body-tertiary opacity-75  fixed-top w-100  ">
    <nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/images/e21f9341-d4df-4d96-a681-9760d9430cac.jpg" alt="..." width="30" height="24">
    </a>
  </div>
 </nav>
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-LEARNING WEBSITE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Dash board</a>
        </li>
      </ul>
      <form class="d-flex gap-4 " role="search" style="text-">
        @if(session('user'))
    <span class="d-flex align-items-center ">Hello, {{ session('user') }}</span>

   <button class="btn btn-outline-primary " type="submit"> <a href="{{ route('logout') }}" style="text-decoration: none;">Logout</a></button>
 @else
   <button class="btn btn-outline-primary" type="submit"> <a href="{{ route('login') }}" style="text-decoration: none;">Login</a></button>

   <button class="btn btn-outline-primary" type="submit"> <a href="{{ route('register') }}" style="text-decoration: none;">Register</a></button>
 @endif
      </form>
    </div>
  </div>
 </nav>
</header>
<!-- home  -->
<div style="
    background-image: url('{{ asset('/images/83fcb51a-b9bb-409b-a170-a5bdd1f52c45.jpg') }}');
    background-size: cover;
    background-position: center;
    width: 100vw;
    height: 100vh;">
 </div>
 <footer style="background-color: #eef6ff;" class="text-dark py-4 mt-5 border-top">
    <div class="container">
        <div class="row text-center text-md-start">

            <!-- Website -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold text-primary">E-Learning</h5>
                <p class="text-secondary">
                    Learn anytime, anywhere with our online courses.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-dark text-decoration-none">Home</a></li>
                    <li><a href="/courses" class="text-dark text-decoration-none">Courses</a></li>
                    <li><a href="/about" class="text-dark text-decoration-none">About</a></li>
                    <li><a href="/contact" class="text-dark text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Contact</h5>
                <p class="mb-1">📧 elearning@example.com</p>
                <p class="mb-0">📞 +20 100 000 0000</p>
            </div>

        </div>

        <hr>

        <div class="text-center">
            <small class="text-secondary">
                &copy; 2026 E-Learning. All Rights Reserved.
            </small>
        </div>
    </div>
</footer>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>