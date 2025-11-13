@extends('component.layout-main')

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
                      <a class="nav-link text-light mx-2" href="{{ route('shop') }}">Shop</a>
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
                      <a class="nav-link text-light mx-2" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping fs-5"></i></a>
                    </li>
                    <li class="nav-item" id="logout">
                        <a class="nav-link text-light mx-2" href="{{ route('login') }}"><i class="fa-solid fa-user fs-5"></i></a>
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

@section('main_container')
    <!-- New Arrivals -->
    <section>
        <div class=" heading pt-4">
            <h2 class="text-center mt-5">New Arrivals</h2>
        </div>
        <div class="product_container d-flex w-100 p-3">
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/skirt.jpg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/top.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/jeans.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/kurti.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/dress.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
        </div>
    </section>
            
    <!-- Shop By Categories -->
    <section>
        <div class=" heading pt-4">
            <h2 class="text-center">Shop By Categories</h2>
        </div>
        <div class="product_container d-flex w-100 p-3">
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="category_name">
                    <div class="fw-semibold fs-4">Part Wear</div>
                </div>
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/lenghacholi.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="category_name">
                    <div class="fw-semibold fs-4">Summer Collection</div>
                </div>
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/shortkurti.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="category_name">
                    <div class="fw-semibold fs-4">Men Wear</div>
                </div>
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/mens.jpeg") }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 320px;"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="category_name">
                    <div class="fw-semibold fs-4">For Kids</div>
                </div>
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/kids.jpeg") }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 320px;"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="category_name">
                    <div class="fw-semibold fs-4">For All</div>
                </div>
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/all.png") }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 320px;"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
        </div>
    </section>
            
    <!-- Banner -->
    <section>
        <div class="d-flex justify-content-center" style="background: linear-gradient(rgb(255, 53, 53), rgb(171, 171, 171))">
            <div id="carouselExampleCaptions" class="carousel slide" style="width: 90vw;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/beautyproduct.png')}}" class="d-block w-100" style="height: 65vh;" alt="slide1">
                        <div class="carousel-caption d-none d-md-block">
                            <button class="btn btn-danger" style="margin-bottom: 10%; margin-left: -60%;">Buy Now</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images\Untitled design.png')}}" class="d-block w-100" style="height: 65vh;" alt="slide2">
                        <div class="carousel-caption d-none d-md-block">
                            <div style="margin-bottom: 10%;">
                                <p class="fs-1 fw-semibold">Special Offer For Winter Collection</p>
                                <p class="fs-4">40% off on winter collection.</p>
                                <button class="btn btn-danger">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images\electric.jpeg')}}" class="d-block w-100" style="height: 65vh;" alt="slide3">
                        <div class="carousel-caption d-none d-md-block">
                            <div style="margin-bottom: 10%;">
                                <p class="fs-1 fw-semibold">Buy electronics at lowest price</p>
                                <p class="fs-5">20% off on Laptops</p>
                                <button class="btn btn-danger">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
            
    <!-- Home Decors And Gadgets -->
    <section>
        <div class=" heading pt-5">
            <h2 class="text-center">Home Decors And Electronics</h2>
        </div>
        <div class="product_container d-flex w-100 p-3">
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="category_name">
                    <div class="fw-semibold fs-4">Morden Home Decors</div>
                </div>
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/homedecors.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="category_name">
                    <div class="fw-semibold fs-4">Electronic Gadgets</div>
                </div>
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/electronics.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="category_name">
                    <div class="fw-semibold fs-4">Home Essentials</div>
                </div>
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/homeessentials.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="category_name">
                    <div class="fw-semibold fs-4">Kitchen Set</div>
                </div>
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/kitchenset.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button class="btn btn-danger btn-sm">View More</button>
                </div>
            </div>
            <div class="product_box w-25 mx-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="category_name">
                    <div class="fw-semibold fs-4">Furniture</div>
                </div>
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset("images/studytable.jpeg") }}');"></div>  
                <div class="Product_details py-2 d-flex justify-content-center">
                    <button type="button" class="btn btn-danger btn-sm">View More</button>
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
