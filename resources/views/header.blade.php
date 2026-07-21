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