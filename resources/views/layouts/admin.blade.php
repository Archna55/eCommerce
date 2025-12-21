<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    
  </head>
  <body>
    
    <!-- Navbar -->
    <header>
      <nav class="container-fluid position-fixed top-0 navbar navbar-expand-lg navbar-scroll">
        <div class="container-fluid">
          <a class="navbar-brand text-danger fs-3 mx-4 fw-semibold" href="{{ route('admin.dashboard') }}">Ecommerce</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-between w-75" id="navbarTogglerDemo01">
            <div class="d-flex justify-content-evenly w-100">
              <ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                      <i class="fa-solid fa-list fs"></i>
                    </li> -->
                <li class="nav-item">
                  <input type="text" class="search rounded-5 px-3 fst-italic" placeholder="Search...">
                </li>
              </ul>
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item d-flex">
                      <button class="btn btn-link fs-5" id="searchBtn">
                        <i class="fa-solid fa-magnifying-glass fs-5"></i>
                      </button>
                      <div class="search-bar d-flex" id="searchBar">
                        <input type="text" placeholder="Search Here..." class="search form-control border-0 border border-bottom border-2 ps-1 rounded-0">
                        <span class="close-btn" id="closeSearch">&times;</span>
                      </div>
                    </li> -->
                <li class="nav-item">
                  <a class="notification nav-link rounded-5 mx-2" href="{{ route('wishlist') }}"><i class="fa-solid fa-bell fs-5"></i></a>
                </li>
                <li class="nav-item" id="logout">
                  <a class="nav-link text-light dropdown-toggle fw-semibold mx-2" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                    <li class="nav-item" aria-labelledby="accountDropdown">
                      <form method="post" action="{{ route('admin.logout') }}" id="adminLogoutForm">
                        @csrf
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('adminLogoutForm').submit();">Logout</a>
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>

      @yield('admin_container')


    <!-- Footer -->
    <footer>
      <div class="container-fluid bg-dark text-light text-center py-3 mt-4">
        <p class="mb-0">&copy; 2024 Ecommerce. All rights reserved.</p>
      </div>
    </footer>
        
    <!-- Add 'scrolled' class to navbar on scroll -->
    <!-- <script>
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
    </script> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
  </body>
</html>