<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class WishlistController extends Controller
{
    public function index()
    {
        $cartCount = Cart::instance('wishlist')->content();
        return view('wishlist', compact('cartCount'));
    }

    public function add_to_wishlist (Request $request)
    {
        Cart::instance('wishlist')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\Product');
        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }

    public function delete_wishlist ($rowId) {
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->back()->with('status', 'Deleted Sucessfully!');
    }

    public function empty_wishlist () {
        Cart::instance('wishlist')->destroy();
        return redirect()->back()->with('status', 'Cart has been cleared!');
    }

    public function move_to_cart ($rowId) {
        $cartCount = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($cartCount->id, $cartCount->name, $cartCount->qty, $cartCount->price)->associate('App\Models\Product');
        return redirect()->back()->with('status', 'Move to Cart Sucessfully!');
    }
}
