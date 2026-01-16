<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/{product_slug}', [ShopController::class, 'product_details'])->name('shop.details');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add_to_cart'])->name('cart.add');
Route::put('/cart/inc-qty/{rowId}', [CartController::class, 'inc_cart_qnt'])->name('qty.inc');
Route::put('/cart/dsc-qty/{rowId}', [CartController::class, 'dsc_cart_qnt'])->name('qty.dsc');
Route::delete('/cart/delete/{rowId}', [CartController::class, 'delete_cart'])->name('delete.cart');
Route::delete('/cart/clear', [CartController::class, 'empty_cart'])->name('clear.cart');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/add', [WishlistController::class, 'add_to_wishlist'])->name('wishlist.add');
Route::delete('/wishlist/delete/{rowId}', [WishlistController::class, 'delete_wishlist'])->name('delete.wishlist');
Route::delete('/wishlist/clear', [WishlistController::class, 'empty_wishlist'])->name('clear.wishlist');
Route::post('/wishlist/move-to-cart/{rowId}', [WishlistController::class, 'move_to_cart'])->name('move.to.cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout/success', [CartController::class, 'order_success'])->name('checkout.success');
Route::get('/order/confirmed', [CartController::class, 'order_confirmed'])->name('order.confirmed');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/brands', [AdminDashboardController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brand/add', [AdminDashboardController::class, 'add_brand'])->name('admin.add.brand');
    Route::post('/admin/brand/store', [AdminDashboardController::class, 'brand_store'])->name('admin.store.brand');
    Route::get('/admin/brand/edit/{id}', [AdminDashboardController::class, 'brand_edit'])->name('admin.edit.brand');
    Route::put('/admin/brand/update', [AdminDashboardController::class, 'brand_update'])->name('admin.update.brand');
    Route::delete('/admin/brand/delete/{id}', [AdminDashboardController::class, 'brand_delete'])->name('admin.delete.brand');

    Route::get('/admin/categories', [AdminDashboardController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/category/add', [AdminDashboardController::class, 'add_category'])->name('admin.add.category');
    Route::post('/admin/category/store', [AdminDashboardController::class, 'category_store'])->name('admin.store.category');
    Route::get('/admin/category/edit/{id}', [AdminDashboardController::class, 'category_edit'])->name('admin.edit.category');
    Route::put('/admin/category/update', [AdminDashboardController::class, 'category_update'])->name('admin.update.category');
    Route::delete('/admin/category/delete/{id}', [AdminDashboardController::class, 'category_delete'])->name('admin.delete.category');

    Route::get('/admin/product', [AdminDashboardController::class, 'products'])->name('admin.products');
    Route::get('/admin/product/add', [AdminDashboardController::class, 'product_add'])->name('admin.add.product');
    Route::post('/admin/product/store', [AdminDashboardController::class, 'product_store'])->name('admin.store.product');
    Route::get('/admin/product/edit/{id}', [AdminDashboardController::class, 'product_edit'])->name('admin.edit.product');
    Route::put('/admin/product/update', [AdminDashboardController::class, 'product_update'])->name('admin.update.product');
    Route::delete('/admin/product/delete/{id}', [AdminDashboardController::class, 'product_delete'])->name('admin.delete.product');

    Route::get('/admin/orders', [AdminDashboardController::class, 'orders'])->name('admin.orders');
    Route::get('/admin/order-details/{order_id}', [AdminDashboardController::class, 'order_details'])->name('admin.order-details');
});

Route::get('/about', function () {
    return view('about');
})->name('about');
