<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary opacity-75 fixed-top">
        <div class="container-fluid">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}">
                <img src="{{ asset('images/e21f9341-d4df-4d96-a681-9760d9430cac.jpg') }}"
                    alt="Logo"
                    width="30"
                    height="24"
                    class="me-2">

                E-LEARNING WEBSITE
            </a>

            <!-- Toggle -->
            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('index') }}">
                            Home
                        </a>
                    </li>

                    @if(session()->has('user'))

                        <li class="nav-item">

                            @if(session('role') == 'admin')

                                <a class="nav-link" href="/admin/dashboard">
                                    Dashboard
                                </a>

                            @else

                                <a class="nav-link" href="/user/dashboard">
                                    Dashboard
                                </a>

                            @endif

                        </li>

                    @endif

                </ul>

                <div class="d-flex gap-2 align-items-center">

                    @if(session()->has('user'))

                        <span class="me-2">
                            Hello, {{ session('user') }}
                        </span>

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
                            class="btn btn-primary">
                            Register
                        </a>

                    @endif

                </div>

            </div>

        </div>
    </nav>
</header>