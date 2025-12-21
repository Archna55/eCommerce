<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="index.js"></script>
  </head>
  <body>
    
    <!-- Navbar -->
    <header>
      @section('header')
        <div class="slider" style="background-image: url('{{ asset("images/crousel1.png") }}')">
          <nav class="container-fluid position-fixed top-0 navbar navbar-expand-lg navbar-scroll">
            <div class="container-fluid">
              <a class="navbar-brand text-danger fs-3 fw-semibold" href="{{ route('home') }}">Ecommerce</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse d-flex justify-content-between w-75" id="navbarTogglerDemo01">
                <div class="d-flex justify-content-evenly w-100">
                  <ul class="navbar-nav ms-3 me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link text-light mx-2" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light mx-2" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light mx-2" href="{{ route('home') }}" id="category">Categories <i class="fa-solid fa-chevron-down fs-5"></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light mx-2" href="{{ route('account.shop') }}">Shop</a>
                    </li>
                  </ul>
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item d-flex">
                      <button class="btn btn-link fs-5" id="searchBtn">
                        <i class="fa-solid fa-magnifying-glass fs-5 text-light"></i>
                      </button>
                      <div class="search-bar d-flex" id="searchBar">
                        <input type="text" placeholder="Search Here..." class="search form-control border-0 border border-bottom border-2 ps-1 rounded-0">
                        <span class="close-btn" id="closeSearch">&times;</span>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light mx-2" href="{{ route('wishlist') }}"><i class="fa-solid fa-heart fs-5"></i></a>
                    </li>
                    <li class="nav-item">
                        <div class="cart_count d-flex">
                            <a class="nav-link text-light ms-2 pe-1" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping fs-5"></i></a>
                            @if (!empty($cartCount) && $cartCount > 0)
                            <span class="text-light fw-semibold float-end me-2">{{ $cartCount }}</span>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item" id="logout">
                      <a class="nav-link dropdown-toggle fw-semibold text-light mx-2" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->full_name }}</a>
                      <ul class="dropdown-menu border" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
          <div class="slide_content_container position-absolute rounded">
            <p class="fw-bold fs-3 text-light p-2">Shop the latest trends today!</p>
            <p class=" fs-5 text-light p-2">New Addition to sale</p>
            <button type="button" class="btn btn-danger">Shop Now</button>
          </div>
        </div>
        <div class="nav-category w-100 justify-content-evenly bg-light" id="nav-category">
          <ul>            
            <li class=" text-danger fs-4 fw-semibold">Women</li>
            <li>Saree</li>
            <li>Suit</li>
            <li>Kurti</li>
            <li>Langha</li>
          </ul>
          <ul>
            <div class="list-group-item border-0 text-danger fs-4 fw-semibold">Men</div>
            <li>Shirt</li>
            <li>Suit</li>
            <li>Kurta</li>
            <li>Jackets</li>
            <li>Jeans</li>
          </ul>
          <ul>
            <div class="list-group-item border-0 text-danger fs-4 fw-semibold">Electric Gadgets</div>
            <li>Laptop</li>
            <li>Mouse</li>
            <li>Desktop</li>
            <li>Keyboard</li>
            <li>Pen Drive</li>
          </ul>
          <ul>
            <div class="list-group-item border-0 text-danger fs-4 fw-semibold">Furniture</div>
            <li>Chair</li>
            <li>Table</li>
            <li>Almirah</li>
            <li>Sofa</li>
          </ul>
          <ul>
            <div class="list-group-item border-0 text-danger fs-4 fw-semibold">Home Decor & essentials</div>
            <li>Kitchen Set</li>
            <li>Canvas</li>
            <li>Bay Leaf Decor</li>
            <li>Wooden Name Plate</li>
          </ul>
        </div>

      @endsection
    </header>

    <main>
      @yield('main_container')
    </main>


    <!-- Footer -->
    <footer>
      @yield('footer')
    </footer>
        
    <!-- Add 'scrolled' class to navbar on scroll -->
    <script>
        const categoryLink = document.getElementById('category');
        const navCategory = document.getElementById('nav-category');

        // Show nav-category on hover
        categoryLink.addEventListener('mouseenter', () => {
            navCategory.classList.add('show');
        });

        navCategory.addEventListener('mouseleave', () => {
            navCategory.classList.remove('show');
        });

        // Show nav-category even when scrolled
        let navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
             navbar.classList.remove('navbar-scrolled');
            }
        });
        // Search bar functionality
      // ...existing code...
      const searchBtn = document.getElementById('searchBtn');
      const closeSearch = document.getElementById('closeSearch');
      const searchBar = document.getElementById('searchBar');

      if (searchBtn && closeSearch && searchBar) {
        searchBtn.addEventListener('click', () => {
          searchBar.classList.add('active');
        });

        closeSearch.addEventListener('click', () => {
          searchBar.classList.remove('active');
        });
      }
      // ...existing code...
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </body>
</html>