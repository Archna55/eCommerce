<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function index()
    {
        $cartCount = Cart::instance('cart')->content();
        return view('cart', compact('cartCount'));
    }

    public function add_to_cart (Request $request) {
        Cart::instance('cart')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\Product');
        return redirect()->back()->with('status', 'Added successfully!');
    }
    
    public function inc_cart_qnt ($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back();
    }
    public function dsc_cart_qnt ($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back();
    }

    public function delete_cart ($rowId) {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back()->with('status', 'Deleted Sucessfully!');
    }

    public function empty_cart () {
        Cart::instance('cart')->destroy();
        return redirect()->back()->with('status', 'Cart has been cleared!');
    }

    public function checkout () {
        if (!Auth::check()) {
            return redirect()->route('login')->with('status', 'Please login to proceed to checkout');
        }
        $address = Address::where('user_id', Auth::user()->id)->where('is_default', true)->first();
        return view('checkout', compact('address'));
    }

    public function order_success (Request $request) {
        $user = Auth::user()->id;
        $address = Address::where('user_id', $user)->where('is_default', true)->first();

        if (!$address) {
            $request->validate([
                'name' => 'required|max:100|string',
                'phone' => 'required|numeric|digits:10',
                'locality' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'landmark' => 'required|string',
                'zip' => 'required|numeric|digits:6',
            ]);

            $address = new Address();
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->locality = $request->locality;
            $address->address = $request->address;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->landmark = $request->landmark;
            $address->country = 'India';
            $address->zip = $request->zip;
            $address->user_id = $user;
            $address->is_default = true;
            $address->save();
        }

        $order = new Order();
        $order->user_id = $user;
        $order->subtotal = Session::get('checkout')['subtotal'] ?? 0;
        $order->discount = Session::get('checkout')['discount'] ?? 0;
        $order->tax = Session::get('checkout')['tax'] ?? 0;
        $order->total = Session::get('checkout')['total'] ?? 0;
        $order->name = $address->name;
        $order->phone = $address->phone;
        $order->locality = $address->locality;
        $order->address = $address->address;
        $order->city = $address->city;
        $order->state = $address->state;
        $order->country = $address->country;
        $order->landmark = $address->landmark;
        $order->zip = $address->zip;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $item->id;
            $orderItem->product_id = $item->id;
            $orderItem->quantity = $item->qty;
            $orderItem->price = $item->qty * $item->price;
            $orderItem->save();
        }

        if ($request->payment_mode == 'online' || $request->payment_mode == 'card') {
            $transaction = new Transaction();
            $transaction->user_id = $user;
            $transaction->order_id = $item->id;
            $transaction->amount = $item->price;
            $transaction->transaction_mode = $request->transaction_mode;
            $transaction->transaction_status = 'success';
            $transaction->save();
        }
        elseif ($request->payment_mode == 'COD') {
            $transaction = new Transaction();
            $transaction->user_id = $user;
            $transaction->order_id = $item->id;
            $transaction->amount = $item->price;
            $transaction->transaction_mode = $request->transaction_mode;
            $transaction->transaction_status = 'pending';
            $transaction->save();
        }

        Cart::instance('cart')->destroy();
        Session::forget('checkout');
        return view('order-confirmed', compact('order'))->with('status', 'Order placed successfully!');
    }

    public function order_confirmed () {
        return view('order-confirmed');
    }
}
