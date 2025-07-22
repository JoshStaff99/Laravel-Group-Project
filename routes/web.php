<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', function () {
    $dashboardType = Auth::user()->is_admin ? 'Admin Dashboard' : 'User Dashboard';
    return view('dashboard', compact('dashboardType'));
})->middleware('auth')->name('dashboard');

Route::resource('products', ProductController::class);

Route::resource('quotes', ProductController::class);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class);
    // dashboard route - shows the admin dashboard 
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // products route - shows the list of products
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    // quotes route - shows the list of quotes
    Route::get('/admin/quotes', [AdminController::class, 'quotes'])->name('admin.quotes');
});

// User routes
Route::middleware(['auth'])->group(function () {
    Route::get('/my-quotes', [UserController::class, 'index'])->name('user.quotes.index');
    Route::get('/my-quotes/{id}', [UserController::class, 'show'])->name('user.quotes.show');
    Route::post('/my-quotes/{id}/accept', [UserController::class, 'accept'])->name('user.quotes.accept');

    // Add QuoteController resource routes for authenticated users
    Route::resource('quotes', QuoteController::class);
});