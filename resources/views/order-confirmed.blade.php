@extends('layouts.app')

@section('content')
    <style>
        .slider {
            background-image: none !important;
            height: 60px;
        }
    </style>
<!-- Checkout Section -->
 <section>
        <div class="container-fluid p-2 pt-5">
            <div class="container d-flex justify-content-center">
                <div class="cart_container w-75 shadow rounded">
                    <h2 class="text-center py-3 m-3">
                        <span class="text-center py-1 border-bottom">Your Orders</span>
                    </h2>
                    @foreach ($order as $product)
                        <div class="cart_item d-flex justify-content-between align-items-center p-3 border-bottom">
                            <div class="item_info d-flex align-items-center">
                                <img loading="lazy" src="{{ asset('images/products/thumbnails') }}/{{ $product->model->image }}" alt="{{ $product->model->name }}" class="cart_img me-3">
                            </div>
                            <div>
                                <p class="text-secondary text-tiny">Order Id: {{ $product->order_id }}</p>
                                <h5>{{ $product->model->name }}</h5>
                                <p class="mb-0">Price: &#8377;{{ $product->model->price }}</p>
                                <p class="mb-0">Payment Mode: {{ $product->payment_mode }}</p>
                                @foreach ($product->orderItems as $item)
                                <p class="mb-0">Quantity: {{ $item->quantity }}</p>
                                
                                <span><Strong>Total: </Strong>&#8377;{{ $item->subTotal() }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </section>
 @endsection