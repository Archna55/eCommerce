@extends('layouts.app')

@section('content')
<main>
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
                <div class="product_img rounded-2 rounded-bottom-0" style="background-image: url('{{ asset('images/electronics.jpeg') }}')"></div>  
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
</main>
@endsection