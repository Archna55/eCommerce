<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// For admin Only
Route::group(['prefix' => 'admin'], function () {
    // Guest Middleware Routes for unauthenticated admins
    Route::group(['middleware' => 'admin.guest'], function () {;
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });
    
    // Protected Middleware Routes for authenticated admins
    Route::group(['middleware' => 'admin.auth'], function () {;
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});

// Group Routes of static pages
Route::group(['prefix' => 'account'], function () {
    // Guest Middleware Routes for unauthenticated user
    Route::group(['middleware' => 'guest'], function () {;
        Route::get('/login', [LoginController::class, 'index'])->name('account.login');
        Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
        Route::get('/register', [LoginController::class, 'register'])->name('account.register');
        Route::post('/processRegistration', [LoginController::class, 'processRegistration'])->name('account.processRegistration');
    });
    
    // Protected Middleware Routes for authenticated users
    Route::group(['middleware' => 'auth'], function () {;
        Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
    });
});

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/blog', function () {
    return view('blog');
})->name('blog');
Route::get('/cart', function () {
    return view('cart');
})->name('cart');


Route::get('/login', function () {
    return view('login');
})->name('login');