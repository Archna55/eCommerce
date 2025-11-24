@extends('layouts.layout-main')

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
                      <a class="nav-link text-dark mx-2" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark mx-2" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark mx-2" href="{{ route('home') }}" id="category">Categories <i class="fa-solid fa-chevron-down fs-5"></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark mx-2" href="{{ route('Shop') }}">Shop</a>
                    </li>
                  </ul>
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item d-flex">
                      <button class="btn btn-link fs-5" id="searchBtn">
                        <i class="fa-solid fa-magnifying-glass fs-5 text-dark"></i>
                      </button>
                      <div class="search-bar d-flex" id="searchBar">
                        <input type="text" placeholder="Search Here..." class="search form-control border-0 border border-bottom border-2 ps-1 rounded-0">
                        <span class="close-btn" id="closeSearch">&times;</span>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark mx-2" href="{{ route('wishlist') }}"><i class="fa-solid fa-heart fs-5"></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark mx-2" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping fs-5"></i></a>
                    </li>
                    <li class="nav-item" id="logout">
                        <a class="nav-link text-dark mx-2" href="{{ route('login') }}"><i class="fa-solid fa-user fs-5"></i></a>
                    </li>
                  </ul>
                </div>
            </div>
        </div>
    </nav>
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

@section('main_container')
    <!-- Shopping Cart Page -->
    <section>
        <div class="container-fluid p-2 pt-5 mt-5">
            <div class="container d-flex justify-content-center">
                <div class="cart_container w-75 shadow rounded">
                    <h2 class="text-center">
                        <span class="text-center py-3 m-3 border-bottom">Your Shopping Cart</span>
                    </h2>
                    @if ($cartCount->count() > 0)
                    @foreach ($cartCount as $product)
                        <div class="cart_item d-flex justify-content-between align-items-center border-bottom p-3">
                            <div class="item_info d-flex align-items-center">
                                <img loading="lazy" src="{{ asset('images') }}/{{ $product->image) }}" alt="{{ $product->name }}" class="me-3" style="width: 100px; height: 100px;">
                                <div>
                                    <h5>{{ $product->name }}</h5>
                                    <p class="mb-0">Price: ${{ $product->price }}</p>
                                    <p class="mb-0">Quantity: {{ $product->quantity }}</p>
                                </div>
                            </div>
                            <div class="item_actions">
                                <button class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="cart_item d-flex justify-content-center align-items-center p-3">
                            <div class="item_info d-flex justify-content-center align-items-center">
                                <img src="{{ asset('images/empty_cart.png') }}" alt="Empty Cart">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
    </section>

@endsection

@section('footer')
    <div class="footer bg-dark text-light p-3 mt-3">
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
    </div>
@endsection