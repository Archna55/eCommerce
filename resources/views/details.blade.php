@extends('layouts.app')

@section('content')
    <style>
        .slider {
            background-image: none !important;
            height: 60px;
        }
        .wishlist {
            color: #e44343 !important;
        } 
    </style>
    <main>
        <div class="container-fluid p-4">
            <div class="container w-100 d-flex justify-content-center">
                <div class="d-flex">
                    <div>
                        @foreach (array_filter(array_map('trim', explode(',', $product->images))) as $img)
                        <div class="g_img me-3 mb-3">
                            <img loading="lazy" src="{{ asset('images/products/thumbnails') }}/{{ $img }}" class="g_img object-cover group-hover:scale-110 transition duration-700" alt="">
                        </div>
                        @endforeach
                    </div>
                    <div class="details_img">
                        <img src="{{ asset('images/products') }}/{{ $product->image }}" 
                            alt="{{ $product->name }}" 
                            class="details_img w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    </div>
                </div>
                <div class="px-5 py-4 w-50">
                    <div class="bookmark pb-3">
                        <div class="d-flex text-start">
                            <a href="{{ route('home') }}" class="text-decoration-none text-info mx-1">Home</a>
                            <span>/</span>
                            <a href="{{ route('shop') }}" class="text-decoration-none text-info mx-1">Shop</a>
                            <span>/</span>
                            <span class="mx-1">details</span>
                        </div>
                    </div>


                    <h3>{{ $product->name }}</h3>
                    <div class="reviews mb-3">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star-half text-warning"></i>
                        <span>(4.2)</span>
                    </div>
                    <p>
                        @if ($product->sale_price)
                            <span class="block fw-bold text-blue-600 text-lg text-decoration-line-through me-2">&#8377;{{ $product->regular_price }}</span>
                            <span class="text-xs text-gray-400 line-through me-2">&#8377;{{ $product->sale_price }}</span>
                        @else
                            <span class="text-xs text-gray-400 line-through me-2">&#8377;{{ $product->regular_price }}</span>
                        @endif
                    </p>
                    <div class="pb-3 mb-4">
                        <span>{{ $product->short_description }}</span>
                    </div>
                    <form action="{{ route('cart.add') }}" name="addToCart-form" method="post">
                        @csrf
                        <div class="d-flex items-center justify-between gap-2 px-1 mb-4">
                            <!-- Input Group: Minus | Qty | Plus -->
                            <div class="quanitiy_container d-flex items-center border rounded-lg overflow-hidden shrink-0">
                                <button type="button" onclick="changeQty(this, -1)" class="px-3 py-2 transition-colors border-0 bg-transparent">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                
                                <input type="number" value="1" name="quantity" min="1"
                                       class="qty-input text-center bg-transparent border-0 font-bold text-sm focus:ring-0 focus:outline-none appearance-none"
                                       readonly>

                                <button type="button" onclick="changeQty(this, 1)" class="px-3 py-2 hover:bg-gray-200 transition-colors border-0 bg-transparent text-gray-600 h-full">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>

                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->sale_price == '' ? $product->regular_price : $product->sale_price }}">
                            <!-- Add Button -->
                            <button type="submit" class="addToCart btn btn-danger flex-grow text-white h-10 px-5 rounded-lg font-bold transition flex items-center justify-center">
                                <i class="fa-solid fa-bag-shopping"></i> Add to cart
                            </button>
                        </div>
                    </form>

                        <div class="">
                            @if (Cart::instance('wishlist')->content()->where('id',$product->id)->count() > 0)
                                    <button type="button" class="border-0 bg-transparent m-3">
                                        <i class="fa-solid fa-heart wishlist fs-5"></i>
                                        <span class="wishlist">ADD TO WISHLIST</span>
                                    </button>
                                @else
                                <form action="{{ route('wishlist.add') }}" method="post" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->sale_price == '' ? $product->regular_price : $product->sale_price }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button class="bg-transparent border-0 pt-1">
                                        <i class="fa-solid fa-heart text-secondary fs-5"></i>
                                        <span>ADD TO WISHLIST</span>
                                    </button>
                                </form>    
                                @endif
                            <button type="button" class="border-0 bg-transparent m-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
                                    <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5"/>
                                </svg>
                                <span>SHARE</span>
                            </button>
                        </div>

                        <div class="details p-3">
                            <h5>Additional details</h5>
                            <p class="mb-1"><span class="text-secondary fw-semibold">SKU:</span><span>{{ $product->SKU }}</span></p>
                            <p class="mb-1"><span class="text-secondary fw-semibold">Categories:</span><span>{{ $product->category->name }}</span></p>
                            <p class="mb-1"><span class="text-secondary fw-semibold">Tags:</span><span>N/A</span></p>
                        </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        function changeQty(btn, delta) {
            const input = btn.parentElement.querySelector('.qty-input');
            let value = parseInt(input.value) + delta;
            if (value < 1) value = 1; 
            input.value = value;
        }
    </script>
@endpush