<!doctype html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- icon fonts awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/style.css">

    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <title>Blog Sport | {{$title}}</title>
</head>

<body>
    
<!-- warna -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top">
  <div class="container justify-content-start">
    <a class="navbar-brand" href="/">BlogTime</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{($title == 'home' ? 'active' : '')}}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{($title == 'about' ? 'active' : '')}}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{($title == 'posts' ? 'active' : '')}}" href="/posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{($title == 'Posts Categories' ? 'active' : '')}}" href="/categories">Category</a>
        </li>
      </ul>

      
      
      <ul class="navbar-nav ms-auto">
      @auth
      <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Halo {{ auth()->user()->name }}
        </a>

        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Dashboard</a></li>
          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item"></button>
            </form>
          </li>
        </ul>
      </div>
        @else
        <li class="nav-item"><a href="/login" class="text-decoration-none text-white"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
        @endauth
      </ul>

     


    </div>
  </div>
</nav>

    <div class="container mt-5">
        @yield('container')
    </div>




<!-- jQuery (Bootstrap requires jQuery) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js (for Bootstrap tooltips and popovers) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>