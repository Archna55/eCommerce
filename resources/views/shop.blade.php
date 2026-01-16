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

        @php
            $selectedBrands = array_filter(array_map('trim', explode(',', $f_brands ?? '')));
            $selectedCategories = array_filter(array_map('trim', explode(',', $f_categories ?? '')));
        @endphp

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
                        <h3 class="text-lg font-bold mb-2 border-b pb-2 border-bottom">Brands</h3>
                        <ul class="space-b-2 list-unstyled">
                            @foreach ($brands as $brand)
                                <li class="list-item w-100">
                                    <span>
                                        <input type="checkbox" name="brands" value="{{ $brand->id }}" class="chk-brand" @if (in_array((string)$brand->id, $selectedBrands)) checked="checked" @endif>{{ $brand->name }}
                                    </span>
                                    <span class="float-end">
                                        {{ $brand->products->count() }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-bold mb-2 border-b pb-2 border-bottom">Categories</h3>
                        <ul class="space-b-2 list-unstyled">
                            @foreach ($categories as $category)
                                <li class="list-item w-100">
                                    <span>
                                        <input type="checkbox" name="categories" value="{{ $category->id }}" class="chk-category" @if (in_array((string)$category->id, $selectedCategories)) checked="checked" @endif>{{ $category->name }}
                                    </span>
                                    <span class="float-end">
                                        {{ $category->products->count() }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Price Range -->
                    <div class="mb-4">
                        <h3 class="text-lg font-bold mb-2 border-b pb-2 border-bottom">Price Range</h3>
                        <a href="{{ route('shop', ['range' => 'under-200']) }}"><button class="border p-2 text-6 font-bold rounded-pill my-2 hover:bg-danger hover:text-white transition">Under &#8377;200</button></a>
                        <a href="{{ route('shop', ['range' => '201-500']) }}"><button class="border p-2 text-6 font-bold rounded-pill my-2 bg-danger text-white">&#8377;201-&#8377;500</button></a>
                        <a href="{{ route('shop', ['range' => '501-800']) }}"><button class="border p-2 text-6 font-bold rounded-pill my-2 hover:bg-danger hover:text-white transition">&#8377;501-&#8377;800</button></a>
                        <a href="{{ route('shop', ['range' => '801-1000']) }}"><button class="border p-2 text-6 font-bold rounded-pill my-2 hover:bg-danger hover:text-white transition">&#8377;801-&#8377;1000</button></a>
                        <a href="{{ route('shop', ['range' => '1001-1500']) }}"><button class="border p-2 text-6 font-bold rounded-pill my-2 hover:bg-danger hover:text-white transition">&#8377;1001-&#8377;1500</button></a>
                        <a href="{{ route('shop', ['range' => '1501-above']) }}"><button class="border p-2 text-6 font-bold rounded-pill my-2 hover:bg-danger hover:text-white transition">&#8377;1501-Above</button></a>
                    </div>
            </aside>
            <div class="product_container border-start">

                <!-- Product Grid -->
                @php
                    $hasSelectedBrands = count($selectedBrands) > 0;
                    $hasSelectedCategories = count($selectedCategories) > 0;
                    $hasRange = request()->has('range');
                @endphp

                @if($products->count() == 0)
                    <div class="p-4 text-center w-100">
                        @if($hasRange && !$hasSelectedBrands && !$hasSelectedCategories)
                            <h4 class="text-secondary">No product found in this price range</h4>
                        @elseif($hasSelectedBrands && !$hasSelectedCategories && !$hasRange)
                            <h4 class="text-secondary">No product found for the selected brand</h4>
                        @elseif($hasSelectedCategories && !$hasSelectedBrands && !$hasRange)
                            <h4 class="text-secondary">No product found for the selected category</h4>
                        @else
                            <h4 class="text-secondary">No products found matching selected filters</h4>
                        @endif
                    </div>
                @endif

                @foreach ($products->chunk(4) as $chunk)
                    
                 <div class="row flex grid grid-cols-3 sm:grid-cols-2 xl:grid-cols-3 gap-6 text-center p-3">
                     
                     @foreach ($chunk as $product)
                     <!-- Product Card -->
                     <div class="col m-3 p-3 product-card rounded-1 overflow-hidden shadow-sm hover:shadow transition-all duration-300 border">
                         <div class="d-flex align-items-start justify-content-end">
                             <!-- <span class="absolute top-4 left-4 bg-red-600 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-widest z-10">Sale</span> -->
                                @if (Cart::instance('wishlist')->content()->where('id',$product->id)->count() > 0)
                                    <button class="position-absolute bg-transparent border-0 p-1 pb-0 m-2 z-10">
                                        <i class="fa-solid fa-heart wishlist fs-5"></i>
                                    </button>
                                @else
                                <form action="{{ route('wishlist.add') }}" method="post" class="position-absolute p-1 pb-0 m-2 z-10">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->sale_price == '' ? $product->regular_price : $product->sale_price }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button class="bg-transparent border-0 pt-1">
                                        <i class="fa-solid fa-heart text-secondary fs-5"></i>
                                    </button>
                                </form>    
                                @endif
                                <a href="{{ route('shop.details', ['product_slug'=>$product->slug]) }}">
                                    <img src="{{ asset('images/products') }}/{{ $product->image }}" 
                                        alt="{{ $product->name }}" 
                                        class="product_img w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                </a>
                                </div>
                                <div class="pt-2">
                                    <div class="d-flex justify-content-between items-start">
                                        <div class="text-start">
                                            <p class="text-secondary uppercase font-bold tracking-widest mb-1">{{ $product->category->name }}</p>
                                            <a href="{{ route('shop.details', ['product_slug'=>$product->slug]) }}" class="text-decoration-none text-black"><h5 class="font-bold text-lg leading-tight hover:text-blue-600 cursor-pointer">{{ $product->name }}</h5></a>
                                            <div class="text-right">
                                                @if ($product->regular_price)
                                                <span class="block fw-bold text-blue-600 text-lg text-decoration-line-through me-2">&#8377;{{ $product->regular_price }}</span>
                                                <span class="text-xs text-gray-400 line-through me-2">&#8377;{{ $product->sale_price }}</span>
                                                @else
                                                <span class="text-xs text-gray-400 line-through me-2">&#8377;{{ $product->sale_price }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            <p ><a href="{{ route('shop.details', ['product_slug'=>$product->slug]) }}" title="Detail info  " class="text-black"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                                </svg>
                                            </a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            
                    </div>
                @endforeach
                        
                <div class="divider"></div>
                <div class="d-flex items-center justify-between flex-wrap gap10 wgp-pegination">
                    {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </main>
    <form action="{{ route('shop') }}" id="frmFilter" method="GET">
        <input type="hidden" name="page" value="{{ $products->currentPage() }}">
        <input type="hidden" name="brands" id="hdnBrands">
        <input type="hidden" name="categories" id="hdnCategories">
    </form>
@endsection

@push('scripts')
    <script>
        $(function() {
            $("input[name='brands']").on('change', function () {
                var brands = "";
                $("input[name='brands']:checked").each(function() {
                    if (brands == "") {
                        brands += $(this).val();
                    } else {
                        brands += "," + $(this).val();
                    }
                });
                $("#hdnBrands").val(brands);
                $("#frmFilter").submit();
            });
            $("input[name='categories']").on('change', function () {
                var categories = "";
                $("input[name='categories']:checked").each(function() {
                    if (categories == "") {
                        categories += $(this).val();
                    } else {
                        categories += "," + $(this).val();
                    }
                });
                $("#hdnCategories").val(categories);
                $("#frmFilter").submit();
            });
        });
    </script>
@endpush