@extends('component.admin')

@section('header')
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
                      <a class="nav-link mx-2" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mx-2" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mx-2" href="{{ route('home') }}" id="category">Categories <i class="fa-solid fa-chevron-down fs-5"></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mx-2" href="{{ route('shop') }}">Shop</a>
                    </li>
                  </ul>
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item d-flex">
                      <button class="btn btn-link fs-5" id="searchBtn">
                        <i class="fa-solid fa-magnifying-glass fs-5"></i>
                      </button>
                      <div class="search-bar d-flex" id="searchBar">
                        <input type="text" placeholder="Search Here..." class="search form-control border-0 border border-bottom border-2 ps-1 rounded-0">
                        <span class="close-btn" id="closeSearch">&times;</span>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mx-2" href="{{ route('wishlist') }}"><i class="fa-solid fa-heart fs-5"></i></a>
                    </li>
                    <li class="nav-item">
                        <div class="cart_count d-flex">
                            <a class="nav-link ms-2 pe-1" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping fs-5"></i></a>
                            @if (!empty($cartCount) && $cartCount > 0)
                            <span class="text-light fw-semibold float-end me-2">{{ $cartCount }}</span>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item" id="logout">
                      <a class="nav-link dropdown-toggle fw-semibold mx-2" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::guard('admin')->user()->full_name }}</a>
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
Welcome Admin!
@endsection

@section('footer')

@endsection