<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/{product_slug}', [ShopController::class, 'product_details'])->name('shop.details');

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
});

// For admin Only
// Route::group(['prefix' => 'admin'], function () {
//     // Guest Middleware Routes for unauthenticated admins
//     Route::group(['middleware' => 'admin.guest'], function () {;
//         Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
//         Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
//     });
    
//     // Protected Middleware Routes for authenticated admins
//     Route::group(['middleware' => 'admin.auth'], function () {;
//         Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
//         Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
//         Route::get('/product', [AdminDashboardController::class, 'products'])->name('admin.products');
//         
//     });
// });


Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/cart', CartController::class . '@index')->name('cart');
Route::get('/wishlist', function () {
    return view('wishlist');
})->name('wishlist');
// Route::post('/wishlist/add', WishlistController::class . 'add_to_wishlist')->name('wishlist.add');
