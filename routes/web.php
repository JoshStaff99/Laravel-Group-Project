<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// groups all admin routes together and protects them with the middleware
Route::middleware(['auth', 'admin'])->group(function () {
    // dashboard route - shows the admin dashboard 
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // products route - shows the list of products
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    // quotes route - shows the list of quotes
    Route::get('/admin/quotes', [AdminController::class, 'quotes'])->name('admin.quotes');
});