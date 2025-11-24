@extends('layouts.admin')

@section('header')
        <nav class="container-fluid position-fixed top-0 navbar navbar-expand-lg navbar-scroll">
            <div class="container-fluid">
              <a class="navbar-brand text-danger fs-3 mx-4 fw-semibold" href="{{ route('home') }}">Ecommerce</a>
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
                      <a class="nav-link text-light dropdown-toggle fw-semibold mx-2" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::guard('admin')->user()->full_name }}</a>
                      <ul class="dropdown-menu border" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </nav>

@endsection

@section('admin_container')
  <div class="admin_sidebar fs-5 text-light">
    <ul>
      <li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/dashboard-svgrepo-com.png') }}" class="sidebar_img" alt="Dashboard Icon">  
        <span>Dashboard</span>
      </li>
      <a href="{{ route('admin.brands') }}"><li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/money.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Brands</span>
      </li></a>
      <a href="{{ route('admin.products') }}" class="text-light text-decoration-none"><li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/product-sf-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Products</span>
      </li></a>
      <li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/report-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Report</span>
      </li>
      <li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/category-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Categories</span>
      </li>
      <li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/activity-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Activity</span>
      </li>
      <li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/customers-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Customers</span>
      </li>
      <li class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('images/management-svgrepo-com.png') }}" class="sidebar_img" alt="Product Icon">  
        <span>Management</span>
      </li>
    </ul>
  </div>

  <div class="admin_main_container p-4">
    <div class="dashboard_cards d-flex justify-content-between mb-4 mt-5 pt-3">
        <h2>Brands Management</h2>
    </div>
  </div>
@endsection

@section('footer')

@endsection