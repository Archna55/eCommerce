@extends('layouts.app')

@section('content')
    <style>
        .slider {
            background-image: none !important;
            height: 60px;
        }
    </style>

<!-- Checkout Section -->

<div class="container mb-5">
    <form action="{{ route('checkout.success') }}" method="post"  class="col-md-12">
        @csrf
        <div class="row g-5">
            <div class="col-md-7">
                <div class="checkout-container">
                    <h2 class="mb-4">Billing Details</h2>
                    @if ($address)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="my-account__address-list">
                                    <div class="my-account__address-list-item">
                                        <p>{{ $address->name }}</p>
                                        <p>{{ $address->address }}</p>
                                        <p>{{ $address->landmark }}</p>
                                        <p>{{ $address->city }}, {{ $address->state }}, {{ $address->country }}</p>
                                        <p>{{ $address->zip }}</p>
                                        <br>
                                        <p>{{ $address->phone }}</p>

                                    </div>    
                                </div>
                            </div>
                        </div>
                    @else
                    <div>
                        <div class="mb-3">
                            <label>Full Name*</label>
                            <input type="text" class="form-control bg-light border-0" name="name" value="{{ old('name') }}" placeholder="Enter your Full name">
                        </div>
                        @error('name')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label>Phone Number*</label>
                            <input type="text" class="form-control bg-light border-0" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number">
                        </div>
                        @error('phone')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label>State*</label>
                            <input type="text" class="form-control bg-light border-0" name="state" value="{{ old('state') }}" placeholder="Enter your state">
                        </div>
                        @error('state')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label>Pin Code*</label>
                            <input type="text" class="form-control bg-light border-0" name="zip" value="{{ old('zip') }}" placeholder="Enter your pin code">
                        </div>
                        @error('zip')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label>Town/City*</label>
                            <input type="text" class="form-control bg-light border-0" name="city" value="{{ old('city') }}" placeholder="Enter your city">
                        </div>
                        @error('city')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label>Area, Road Name, Colony*</label>
                            <input type="text" class="form-control bg-light border-0" name="locality" value="{{ old('locality') }}" placeholder="Enter house number or building">
                        </div>
                        @error('locality')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <div class="mb-4">
                            <label>House No./ Building*</label>
                            <input type="text" class="form-control bg-light border-0" name="address" value="{{ old('address') }}" placeholder="Enter house number or building">
                        </div>
                        @error('address')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <div class="mb-4">
                            <label>Landmark*</label>
                            <input type="text" class="form-control bg-light border-0" name="landmark" value="{{ old('landmark') }}" placeholder="Enter landmark">
                        </div>
                        @error('landmark')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="col-md-5">
                <div class="summary-box">
                    <h4 class="mb-4">Order Summary</h4>
                    
                    <table class="w-100 border">
                    <tr class="border-bottom">
                        <th class="w-50 px-3 py-2">Product</th>
                        <th class="w-50 px-3 py-2">Price</th>
                        <th class="w-50 px-3 py-2">Total</th>
                    </tr>
                    @foreach (Cart::instance('cart')->content() as $item)
                    <tr class=" border-bottom">
                        <td class="w-50 px-3 py-2">{{ $item->name }}</td>
                        <td class="w-50 px-3 py-2">&#8377;{{ $item->price }}</td>
                        <td class="w-50 px-3 py-2">&#8377;{{ $item->subtotal() }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <hr class="my-4">
            
            <div class="d-flex justify-content-between mb-2">
                <span>Subtotal:</span>
                <span class="fw-bold">&#8377;{{ Cart::instance('cart')->subtotal() }}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Shipping:</span>
                <span class="text-success">Free Shipping</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Tax:</span>
                <span class="fw-bold">&#8377;{{ Cart::instance('cart')->tax() }}</span>
            </div>
            <div class="d-flex justify-content-between mt-3 mb-4">
                <h5 class="fw-bold">Total:</h5>
                <h5 class="fw-bold text-danger">&#8377;{{ Cart::instance('cart')->total() }}</h5>
            </div>
            
            <h5 class="fw-bold mb-3">Payment Options</h5>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="payment_mode" id="cod" value="cod" checked>
                <label class="form-check-label text-dark" for="cod">Cash on Delivery</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="payment_mode" id="bank" value="card">
                <label class="form-check-label text-dark" for="bank">Card</label>
            </div>
            <div class="form-check mb-4">
                <input class="form-check-input" type="radio" name="payment_mode" id="online" value="online">
                <label class="form-check-label text-dark" for="online">Online Payment</label>
            </div>
            
            <button type="submit" class="w-100 btn btn-danger shadow-sm">Place Order</button>
            </div>
        </div>
    </form>
</div>

@endsection