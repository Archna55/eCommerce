<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartCount = Cart::instance('cart')->content();
        return view('cart', compact('cartCount'));
    }
}
