@extends('layouts.app')

@section('content')
    <style>
        .slider {
            background-image: none !important;
            height: 60px;
        }
    </style>
    <!-- Shopping Cart Page -->
    <section>
        <div class="container-fluid p-2 pt-5">
            <div class="container d-flex justify-content-center">
                <div class="cart_container w-75 shadow rounded">
                    <h2 class="text-center py-3 m-3">
                        <span class="text-center py-1 border-bottom">Your Shopping Cart</span>
                    </h2>
                    @if ($cartCount->count() > 0)
                    @foreach ($cartCount as $product)
                        <div class="cart_item d-flex justify-content-between align-items-center p-3 border-bottom">
                            <div class="item_info d-flex align-items-center">
                                <img loading="lazy" src="{{ asset('images/products/thumbnails') }}/{{ $product->model->image }}" alt="{{ $product->model->name }}" class="cart_img me-3">
                            </div>
                            <div>
                                <h5>{{ $product->name }}</h5>
                                <p class="mb-0">Price: &#8377;{{ $product->price }}</p>
                                <div class="quanitiy_container d-flex items-center border overflow-hidden shrink-0">
                                    <form action="{{ route('qty.dsc', ['rowId' => $product->rowId]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" onclick="changeQty(this, -1)" class="dsc px-3 py-2 transition-colors border-0 bg-transparent">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </form>
                                
                                    <input type="number" value="{{ $product->qty }}" name="quantity" min="1"
                                       class="qty-input text-center bg-transparent border-0 font-bold text-sm focus:ring-0 focus:outline-none appearance-none"
                                       readonly>
                                    <form action="{{ route('qty.inc', ['rowId' => $product->rowId]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" onclick="changeQty(this, 1)" class="inc px-3 py-2 transition-colors border-0 bg-transparent">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </form>
                                </div>
                                <span><Strong>Total: </Strong>&#8377;{{ $product->subTotal() }}</span>
                            </div>
                            <div class="item_actions ">
                                <form action="{{ route('delete.cart', ['rowId'=> $product->rowId]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0)" class="delete">
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </a>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="cart_item d-flex justify-content-center align-items-center p-3">
                            <div class="item_info d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('images/empty_cart.png') }}" class="empty" alt="Empty Cart">
                                <a href="{{ asset('shop') }}"><button type="submit" class="btn btn-danger m-4">
                                    Shop now
                                </button></a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="position-fixed bottom-0 w-100 bg-white z-10 p-3 ">
                    <div class="d-flex justify-content-between px-3">
                        <span class="fw-bold">Grand Total: {{ Cart::instance('cart')->subTotal() }}</span>
                        <form action="{{ route('clear.cart') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-secondary">Clear Cart</button>
                        </form>
                        <a href="{{ route('checkout') }}"><button type="button" class="btn btn-danger">Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

@endsection

@push('scripts')
    <script>
        function changeQty(btn, delta) {
            const input = btn.parentElement.querySelector('.qty-input');
            let value = parseInt(input.value) + delta;
            if (value < 1) value = 1; 
            input.value = value;
        }

        $(function() {
            $(".inc").on("click", function() {
                $(this).closest('form').submit();
            });
            $(".dsc").on("click", function() {
                $(this).closest('form').submit();
            });
            $(".delete").on("click", function() {
                $(this).closest('form').submit();
            });
        });
    </script>
@endpush