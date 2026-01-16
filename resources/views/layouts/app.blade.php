<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="index.js"></script> -->
  </head>
  <body>
    <header>
      <div class="slider">
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
                    <a class="nav-link text-light mx-2" href="{{ route('dashboard') }}" id="category">Categories <i class="fa-solid fa-chevron-down fs-5"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light mx-2" href="{{ route('shop') }}">Shop</a>
                  </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item d-flex">
                    <button class="btn btn-link fs-5" id="searchBtn" title="Search">
                      <i class="fa-solid fa-magnifying-glass fs-5 text-light"></i>
                    </button>
                    <div class="search-bar d-flex" id="searchBar">
                      <input type="text" placeholder="Search Here..." class="search form-control border-0 border border-bottom border-2 ps-1 rounded-0">
                      <span class="close-btn" id="closeSearch">&times;</span>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light mx-2" href="{{ route('wishlist') }} " title="Wishlist"><i class="fa-solid fa-heart fs-5"></i>
                      <span class="position-absolute top-5 start-85 translate-middle px-1 bg-danger border border-light rounded-circle">
                        @if (Cart::instance('wishlist')->content()->count()>0)
                          <span class="text-6 text-tiny">{{ Cart::instance('wishlist')->content()->count() }}</span>
                        @endif
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light mx-2" href="{{ route('cart') }} " title="Cart"><i class="fa-solid fa-cart-shopping fs-5"></i>
                      <span class="position-absolute top-5 start-85 translate-middle px-1 bg-danger border border-light rounded-circle">
                        @if (Cart::instance('cart')->content()->count()>0)
                          <span class="text-6 text-tiny">{{ Cart::instance('cart')->content()->count() }}</span>
                        @endif
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    @guest
                      <a class="nav-link text-light mx-2" href="{{ route('login') }}" title="Login"><i class="fa-solid fa-user fs-5"></i></a>
                    @else
                      <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-light dropdown-toggle" href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item " href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                          </form>

                        </div>
                      </li>
                    @endguest
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
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
    </header>

    @yield('content')
    
    <footer class="footer bg-dark text-light p-3">
        <div class="special_customers text-center">
            <span class="fs-4 fw-bold">Make Yourself Our Special Customer</span>
            <div class="sp_cust_input m-3">
                <input type="email" class="form-control w-25 d-inline" placeholder="Enter Your Email" name="" id="">
                <button class="btn btn-danger mx-2 mb-1">Verify Now</button>
            </div>
        </div>
        <div class="footer_container d-flex justify-content-evenly w-75 m-auto">
            <div class="footer-1 w-25">
                <p class="text-danger fw-semibold fs-4 mb-1">Ecommerce</p>
                <span class="fs-smaller lh-0">Ecommerce is here to make your busy schedule easier and flexible for shopping. Take one-more step and place order, get delivery at home.</span>
            </div>
            <div class="footer-2">
                <div class="list-group">
                    <p class="fs-5 fw-bold mb-1"><span>Links</span></p>
                    <a href="#" class="text-light text-decoration-none"><span>Categories</span></a>
                    <a href="#" class="text-light text-decoration-none"><span>Shop</span></a>
                    <a href="login.html" class="text-light text-decoration-none"><span>Login</span></a>
                    <a href="cart.html" class="text-light text-decoration-none"><span>Cart</span></a>
                </div>
            </div>
            <div class="footer-3">
                <div class="list-group">
                    <p class="fs-5 fw-bold mb-1">Customer Service</p>
                    <a href="#" class="text-light text-decoration-none"><span>Contact US</span></a>
                    <a href="#" class="text-light text-decoration-none"><span>FAQs</span></a>
                    <a href="#" class="text-light text-decoration-none"><span>Placed Orders</span></a>
                    <a href="#" class="text-light text-decoration-none"><span>Help</span></a>
                </div>
            </div>
            <div class="footer-3">
                <p class="fs-5 fw-bold mb-1">Our Info</p>
                <div class="list-group">
                    <span><i class="fa-regular fa-envelope"></i> archna25203@gamil.com</span>
                    <span><i class="fa-solid fa-phone"></i> +91 867XXXXXXX</span>
                    <span>
                        <a href="https://www.facebook.com/" class="social-logo"><img src="{{ asset('images/facebook.png') }}" alt="facebook"></a>
                        <a href="https://www.instagram.com" class="social-logo"><img src="{{ asset('images/instagram.png') }}" alt="instagram"></a>
                        <a href="https://www.whatsapp.com" class="social-logo"><img src="{{ asset('images/whatsapp.png') }}" alt="whatsapp"></a>
                        <a href="https://www.pintrest.com" class="social-logo"><img src="{{ asset('images/pinterest.png') }}"alt="pintrest"></a>
                    </span>
                </div>
            </div>
        </div>
        <hr>
        <div class="bottom_line">
            <p class="text-center mb-0">&copy; All rights are reserved</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
    @stack('scripts')
  </body>
</html>