<<<<<<< HEAD
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary opacity-75 fixed-top">
        <div class="container-fluid">
=======
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
          <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item">
          
          @if(session()->has('user'))

            @if(session('role') == 'admin')
              <a href="/admin/dashboard" class="nav-link">
                Dashboard
              </a>
            @else
              <a href="/user/dashboard" class="nav-link">
                Dashboard
              </a>
            @endif

          @else

            <a href="/login" class="btn btn-primary">
              Login
            </a>

          @endif
        </li>
      </ul>
      <form class="d-flex gap-4 " role="search" style="text-">
        @if(session('user'))
    <span class="d-flex align-items-center ">Hello, {{ session('user') }}</span>
>>>>>>> ba1f7fc871569ed2b4bfb2056c864cfe9e3a3346

            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/images/e21f9341-d4df-4d96-a681-9760d9430cac.jpg"
                    alt="Logo"
                    width="30"
                    height="24"
                    class="me-2">

                E-LEARNING WEBSITE
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('index') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}">Dash board</a>
                    </li>
                </ul>

                <div class="d-flex gap-2 align-items-center">
                    @if(session('user'))
                        <span>Hello, {{ session('user') }}</span>

                        <a href="{{ route('logout') }}"
                            class="btn btn-outline-primary">
                            Logout
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="btn btn-outline-primary">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                            class="btn btn-outline-primary">
                            Register
                        </a>
                    @endif
                </div>

            </div>

        </div>
    </nav>
</header>