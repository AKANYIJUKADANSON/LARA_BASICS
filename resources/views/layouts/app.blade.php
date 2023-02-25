<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('APPNAME', 'ShopApp') }}</title>

    <link rel="stylesheet" href="{{'assets/css/bootstrap.min.css'}}">

    {{-- The css link below will be used in the posts pges --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi bi-grid bg-danger" width="40" height="32" role="img" aria-label="Bootstrap">
                
            </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-0">
            <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
            <li><a href="/about" class="nav-link px-2 text-white">About</a></li>
            <li><a href="/services" class="nav-link px-2 text-white">Services</a></li>
            <li><a href="/posts" class="nav-link px-2 text-white">Blog</a></li>
            <li><a href="/contact" class="nav-link px-2 text-white">Contact</a></li>
            <li><a href="/xx" class="nav-link px-2 text-white">xx</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input type="search" class="form-control form-control-light text-bg-light" placeholder="Search..."
                aria-label="Search">
        </form>

        <div class="text-end">
            <a href="/login" type="button" class="btn btn-outline-light me-2">Login</a>
            <a href="/register" type="button" class="btn btn-warning">Sign-up</a>
        </div>
    </div>
    </div>
  </header>


    {{-- This means that all this code can be used in another page without
                typing it again... jst extending it and then put the data in the section part --}}
    <div class="container">
        @yield('content')
    </div>
    <script src="{{'assets/js/bootstrap.bundle.min.js'}}" ></script>
    <script src="{{'assets/js/jquery.min.js'}}" ></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>