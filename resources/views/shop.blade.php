@extends('layouts.app')

@section('content')
    <style>
        .slider {
            background-image: none !important;
            height: 60px;
        }
        .filter-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .product-card:hover .quick-add {
            opacity: 1;
            transform: translateY(0);
        }
        .product-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .font-danger:hover, .text-black:hover {
            color: red;
        } 
        
        /* Slide-up effect for the Quick Add button */
        .quick-add {
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .product-card:hover .quick-add {
            transform: translateY(0);
            opacity: 1;
        }

        /* Image zoom effect */
        .product-img-container img {
            transition: transform 0.6s ease;
        }

        .product-card:hover .product-img-container img {
            transform: scale(1.08);
        }

        /* Custom scrollbar for sidebar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
    </style>
    <main>

        <div class="shop_container container-fluid d-flex ps-0">
            <aside class="shop_sidebar px-4 py-2">
                <!-- BreadCrumb -->
                <div class="bookmark py-3">
                    <div class="d-flex text-start">
                        <a href="{{ route('home') }}" class="text-decoration-none text-info mx-1">Home</a>
                        <span>/</span>
                        <span class="mx-1">Shop</span>
                    </div>
                </div>
                <!-- Categories -->
                    <div class="mb-4">
                        <h3 class="text-lg font-bold mb-2 border-b pb-2 border-bottom">Categories</h3>
                        <ul class="space-b-2 list-unstyled">
                            <li><label class="flex items-center space-x-3 cursor-pointer"><input type="checkbox" class="rounded text-blue-600 w-4 h-4"> <span>Jackets & Coats</span></label></li>
                            <li><label class="flex items-center space-x-3 cursor-pointer"><input type="checkbox" class="rounded text-blue-600 w-4 h-4" checked> <span>Suits</span></label></li>
                            <li><label class="flex items-center space-x-3 cursor-pointer"><input type="checkbox" class="rounded text-blue-600 w-4 h-4"> <span>Ethnic Wear</span></label></li>
                            <li><label class="flex items-center space-x-3 cursor-pointer"><input type="checkbox" class="rounded text-blue-600 w-4 h-4"> <span>Accessories</span></label></li>
                        </ul>
                    </div>
                    <!-- Price Range -->
                    <div class="mb-4">
                        <h3 class="text-lg font-bold mb-2 border-b pb-2 border-bottom">Price Range</h3>
                        <button class="border p-2 text-6 font-bold rounded-pill my-2 hover:bg-danger hover:text-white transition">&#8377;100-&#8377;200</button>
                            <button class="border p-2 text-6 font-bold rounded-pill my-2 bg-danger text-white">&#8377;201-&#8377;500</button>
                            <button class="border p-2 text-6 font-bold rounded-pill my-2 hover:bg-danger hover:text-white transition">&#8377;501-&#8377;800</button>
                            <button class="border p-2 text-6 font-bold rounded-pill my-2 hover:bg-danger hover:text-white transition">&#8377;801-&#8377;1000</button>
                            <button class="border p-2 text-6 font-bold rounded-pill my-2 hover:bg-danger hover:text-white transition">&#8377;1000-&#8377;1500</button>
                            <button class="border p-2 text-6 font-bold rounded-pill my-2 hover:bg-danger hover:text-white transition">&#8377;1500-Above</button>
                    </div>

                    <div class="flex items-center justify-between mb-6 bg-white p-2 fw-semibold rounded-xl shadow-sm">
                        <p class="text-gray-500 text-sm">Showing <span class="font-bold text-gray-900">12</span> of 48 products</p>
                            <div class="flex space-x-4 items-center">
                                <div class="select">
                                <select class="dropdown-select text-sm font-medium focus:outline-none cursor-pointer">
                                    <option>Sort by: Newest</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                    <option>Most Popular</option>
                                </select>
                            </div>
                            <!-- <div class="flex space-x-2 border-l pl-4 hidden sm:flex">
                                <button class="text-blue-600"><i class="fa-solid fa-grip"></i></button>
                                <button class="text-gray-400 hover:text-blue-600"><i class="fa-solid fa-list"></i></button>
                            </div> -->
                        </div>
                    </div>
                    <!-- Sizes -->
                    <!-- <div>
                        <h3 class="text-lg font-bold mb-4 border-b pb-2">Sizes</h3>
                        <div class="grid grid-cols-4 gap-2">
                            <button class="border p-2 text-xs font-bold hover:bg-danger hover:text-white transition">XS</button>
                            <button class="border p-2 text-xs font-bold bg-danger text-white">S</button>
                            <button class="border p-2 text-xs font-bold hover:bg-danger hover:text-white transition">M</button>
                            <button class="border p-2 text-xs font-bold hover:bg-danger hover:text-white transition">L</button>
                        </div>
                    </div> -->
            </aside>
            <div class="product_container border-start">

                <!-- Product Grid -->
                 @foreach ($products->chunk(4) as $chunk)
                    
                 <div class="row flex grid grid-cols-3 sm:grid-cols-2 xl:grid-cols-3 gap-6 text-center p-3">
                     
                     @foreach ($chunk as $product)
                     <!-- Product Card -->
                     <div class="col m-3 p-3 product-card rounded-1 overflow-hidden shadow-sm hover:shadow transition-all duration-300 border hover:border-blue-100">
                         <div class="relative bg-gray-100 overflow-hidden d-flex align-items-start justify-content-end">
                             <!-- <span class="absolute top-4 left-4 bg-red-600 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-widest z-10">Sale</span> -->
                             <button class="position-absolute top-4 left-4  bg-transparent border-0 p-1 pb-0 rounded-circle m-2 shadow-md transition z-10">
                                 <i class="fa-solid fa-heart text-secondary fs-5 font-danger"></i>
                                </button>
                                <a href="{{ route('shop.details', ['product_slug'=>$product->slug]) }}">
                                    <img src="{{ asset('images/products') }}/{{ $product->image }}" 
                                        alt="{{ $product->name }}" 
                                        class="product_img w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                </a>
                                    <!-- Quick Add (Shows on Hover) -->
                                    <div class="quick-add position-absolute bottom-0 left-0 right-0 p-4 translate-y-full opacity-0 transition-all duration-300">
                                        <button class="w-full bg-black text-white py-3 rounded-lg font-bold text-sm hover:bg-blue-600 transition shadow-lg">
                                            <i class="fa-solid fa-bag-shopping mr-2"></i> Quick Add
                                        </button>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="d-flex justify-content-between items-start">
                                        <div class="text-start">
                                            <p class="text-secondary uppercase font-bold tracking-widest mb-1">{{ $product->category->name }}</p>
                                            <a href="{{ route('shop.details', ['product_slug'=>$product->slug]) }}" class="text-decoration-none text-black"><h5 class="font-bold text-lg leading-tight hover:text-blue-600 cursor-pointer">{{ $product->name }}</h5></a>
                                            <div class="text-right">
                                                @if ($product->sale_price)
                                                <span class="block fw-bold text-blue-600 text-lg text-decoration-line-through me-2">&#8377;{{ $product->regular_price }}</span>
                                                <span class="text-xs text-gray-400 line-through me-2">&#8377;{{ $product->sale_price }}</span>
                                                @else
                                                <span class="text-xs text-gray-400 line-through me-2">&#8377;{{ $product->regular_price }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="flex items-center space-x-1 text-yellow-400 text-xs mt-2">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                        <span class="text-gray-400 ml-2">(4.2)</span>
                                    </div> -->
                                </div>
                            </div>
                        @endforeach
                            
                    </div>
                @endforeach
                        
                <div class="divider"></div>
                <div class="d-flex items-center justify-between flex-wrap gap10 wgp-pegination">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>

            </div>
            </div>
        </div>
    </main>
@endsection