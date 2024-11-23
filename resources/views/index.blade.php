<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WhereNext</title>
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    
</head>
@if(Session::has('logined'))
 <script>
    document.addEventListener('DOMContentLoaded', function() {
    alert("{{ session('logined') }}");
  });
  </script>
@endif
<body>
  <nav class="navbar navbar-expand-sm navbar-dark sticky-top fixed-top bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#packages">Packages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#footer">Contact Us</a>
          </li>
          
           @if(Session::has('fname'))
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">{{ Session('fname') }}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a></li>
              <li><a class="dropdown-item" href="#">Bookings</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
            @else
             <li class="nav-item">
            <a class="nav-link" href="{{ route('customer.loginview') }}"aria-disabled="true">Login</a>
          </li>

        @endif
        </ul>
        <form role="search">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
  <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
       <video class="d-block w-100"  autoplay muted>
        <source src="{{ asset('img/pexels-fearless-dreams-5598970 (2160p).mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/t1.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <video class="d-block w-100"  autoplay muted>
        <source src="{{ asset('img/pexels_videos_1409899 (2160p).mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<section id="packages">
  @foreach ($packages as $package) 
  <div class="card" style="width: 18rem;">
  <img src="{{ asset($package->Poster_image) }}" alt="...." class="card-img-top" style="max-width: 200px;">

  <div class="card-body">
    <h5 class="card-title">{{ $package->Destination }}</h5>
    <p class="card-text">{{ $package->Description }}</p>
    <a href="#" class="btn btn-primary">Book</a>
  </div>
</div>
  @endforeach
    

</section>
  <section id="Footer">
    
  </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

