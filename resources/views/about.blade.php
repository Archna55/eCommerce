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
                      <a class="nav-link text-dark mx-2" href="{{ route('shop') }}">Shop</a>
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
                      <a class="nav-link text-dark mx-2" href="/wishlist"><i class="fa-solid fa-heart fs-5"></i></a>
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
    <!-- Bookmark -->
    <section>
        <div class="bookmark container-fluid p-2 pt-5 mt-5">
            <div class="container d-flex">
                <a href="{{ route('home') }}" class="text-decoration-none text-info mx-2">Home</a>
                <span>/</span>
                <a href="{{ route('about') }}" class="text-decoration-none text-dark mx-2">About Us</a>
            </div>
        </div>
        
    </section>
    <section>
        <div class="about_us container my-3">
            <h2 class="text-center mb-5">About us</h2>
            <p class="about lh-base">Welcome to eCommerce! We started this project to make a better online shopping patform. Every item you find here is selected with purpose and passion. Thank you for joining our community and supporting a better way to shop.</p>
            <div class="row">
                <div class="col-md-3 py-3 px-4">
                    <img src="{{ asset('images/about.jpg') }}" alt="about us" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-9 px-5 d-flex flex-column justify-content-center">
                    <p class="about lh-base">Ecommerce is your one-stop shop for all your shopping needs. We are committed to providing you with a seamless and enjoyable shopping experience, whether you're looking for the latest fashion trends, cutting-edge electronics, or unique home decor items. Our mission is to make shopping easy, convenient, and accessible for everyone.</p>
                    <p class="about lh-base">At Ecommerce, we believe that shopping should be more than just a transaction; it should be an experience. That's why we offer a wide range of products from top brands and emerging designers, all carefully curated to meet the needs and preferences of our diverse customer base. Our user-friendly website and mobile app make it easy to browse, compare, and purchase products from the comfort of your own home.</p>
                    <p class="about lh-base">Customer satisfaction is our top priority, and we go above and beyond to ensure that every order is processed quickly and efficiently. Our dedicated customer service team is always available to assist you with any questions or concerns you may have, and we offer hassle-free returns and exchanges to ensure that you're completely satisfied with your purchase.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- <section>
        <div class="container my-5">
            <div class="row text-center">
                <div class="col-md-3 ">
                    <div class="stats-box">
                        <i class="fas fa-store fa-2x"></i>
                        <h4>10.5k</h4>
                        <p>Sellers active on our site</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-box highlighted">
                        <i class="fas fa-chart-line fa-2x"></i>
                        <h4>33k</h4>
                        <p>Monthly Product Sale</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-box">
                        <i class="fas fa-users fa-2x"></i>
                        <h4>45.5k</h4>
                        <p>Customers active on our site</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-box">
                        <i class="fas fa-dollar-sign fa-2x"></i>
                        <h4>25k</h4>
                        <p>Annual gross sales</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
    <section>
        <div class="container my-5">
            <h2 class="text-center mb-5">Our Founders</h2>
            <div class="row founders">
                <div class="col-md-4 px-5 text-center team-member">
                    <img src="{{asset('images/chairman.jpeg')}}" class="img-fluid shadow" alt="Tom Cruise">
                    <h5 class="mt-3">Tom Cruise</h5>
                    <p class="mb-2">Founder & Chairman</p>
                    <p><i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i> <i class="fab fa-linkedin"></i></p>
                </div>
                <div class="col-md-4 px-5 text-center team-member">
                    <img src="{{asset('images/businesswoman.jpeg')}}" class="img-fluid shadow" alt="Emma Watson">
                    <h5 class="mt-3">Emma Watson</h5>
                    <p class="mb-2">Managing Director</p>
                    <p><i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i> <i class="fab fa-linkedin"></i></p>
                </div>
                <div class="col-md-4 px-5 text-center team-member">
                    <img src="{{asset('images/productdessigner.jpeg')}}" class="img-fluid shadow" alt="Will Smith">
                    <h5 class="mt-3">Will Smith</h5>
                    <p class="mb-2">Product Designer</p>
                    <p><i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i> <i class="fab fa-linkedin"></i></p>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="cutomerSupport my-5">
            <h2 class="text-center mb-5">Our Services</h2>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-4 text-center">
                        <i class="fa-solid fa-sack-dollar mb-4"></i>
                        <h4>Money Back Guarantee</h3>
                        <p>We source the finest materials and work with skilled artisans to create products that last.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fa-solid fa-truck mb-4"></i>
                        <h4>Services</h3>
                        <p>We are committed to reducing our environmental impact through eco-friendly practices.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fa-solid fa-headset mb-4"></i>
                        <h4>24/7 Support</h3>
                        <p>Your happiness is our priority. We offer easy returns, fast shipping, and exceptional customer service.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="cutomerSupport my-5">
            <h2 class="text-center mb-5">What our customers says?</h2>
            <div class="container">
                <div class="row d-flex justify-content-evenly mt-5">
                    <div class="reviewContainer border rounded shadow">
                        <div class="d-flex justify-content-start ms-3 mt-3 align-items-center">
                            <img src="{{ asset('images/person2.webp') }}" class="persons" alt="Maria">
                            <div class="d-flex flex-column">
                                <h5 class="ms-3 mb-1">Maria</h5>
                                <div class="ms-3">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                        <p class="review">"I am absolutely thrilled with my purchase! The Korean-Shorts is even better than described—the quality is top-notch and feels built to last. What really impressed me was the lightning-fast shipping. I received my order two days earlier than expected! Fantastic product, great price, and super quick delivery. I highly recommend this store!"</p>
                    </div>
                    <div class="reviewContainer border rounded shadow">
                        <div class="d-flex justify-content-start ms-3 mt-3 align-items-center">
                            <img src="{{ asset('images/person1.webp') }}" class="persons" alt="Michael">
                            <div class="d-flex flex-column">
                                <h5 class="ms-3 mb-1">Michael</h5>
                                <div class="ms-3">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                        <p class="review">"This Lenovo Laptop[Electric Gadgets] was exactly what I was looking for! The photos and description on the site were 100% accurate. It also arrived beautifully packaged, making it a perfect gift. I love finding reliable shops like this. Two thumbs up!"</p>
                    </div>
                    <div class="reviewContainer border rounded shadow">
                        <div class="d-flex justify-content-start ms-3 mt-3 align-items-center">
                            <img src="{{ asset('images/person3.webp') }}" class="persons" alt="Jannifer">
                            <div class="d-flex flex-column">
                                <h5 class="ms-3 mb-1">Jannifer</h5>
                                <div class="ms-3">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                        <p class="review">"An excellent experience from start to finish! I had a question about sizing before placing my order and the customer service team was quick, helpful, and very friendly. The website was easy to navigate, and the checkout process was smooth. My order was perfectly packaged. It's clear this company genuinely cares about its customers. I'll definitely be a repeat buyer!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    <div class="footer bg-dark text-light p-3">
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