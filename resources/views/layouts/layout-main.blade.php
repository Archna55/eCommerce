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
      @yield('header')
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