@extends('layouts.app')

@section('content')
<style>
    .slider {
        background-image: none !important;
        height: 60px;
    }
</style>
    <!--  Wishlist Page -->
    <main>
        <div class="container-fluid p-2 pt-5 mt-5">
            <div class="container d-flex justify-content-center">
                <div class="cart_container w-75 shadow rounded p-3">
                    <h2 class="text-center py-3 m-3 ">
                        <span class="text-center py-1 border-bottom">Your Wishlist Cart</span>
                    </h2>
                    @if ($cartCount->count() > 0)
                    @foreach ($cartCount as $product)
                        <div class="cart_item d-flex justify-content-between align-items-center p-3 border-bottom">
                            <div class="item_info d-flex align-items-center">
                                @if (optional($product->model)->image)
                                    <img loading="lazy" src="{{ asset('images/products/thumbnails') }}/{{ $product->model->image }}" alt="{{ $product->model->name ?? $product->name }}" class="cart_img me-3">
                                @else
                                    <img loading="lazy" src="{{ asset('images/placeholder.png') }}" alt="No image" class="cart_img me-3">
                                @endif
                            </div>
                            <div>
                                <h5>{{ $product->name }}</h5>
                                <p class="mb-0">Price: &#8377;{{ $product->price }}</p>
                                <p>Quantity: {{ $product->qty }}</p>
                                <span><strong>Total: </strong>&#8377;{{ $product->subTotal() }}</span>
                            </div>
                            <div class="item_actions ">
                                <form action="{{ route('delete.wishlist', ['rowId'=> $product->rowId]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0)" class="delete">
                                        <button type="submit" class="btn btn-danger my-3">Remove</button>
                                    </a>
                                </form>
                                <form action="{{ route('move.to.cart', ['rowId'=> $product->rowId]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Move to Cart</button>
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
            </div>
        </div>
        
    </main>

@endsection