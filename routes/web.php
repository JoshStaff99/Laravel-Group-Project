<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class);
// groups all admin routes together and protects them with the middleware only allowing admin to access TEST
Route::middleware(['auth', 'admin'])->group(function () {
    // dashboard route - shows the admin dashboard 
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // products route - shows the list of products
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    // quotes route - shows the list of quotes
    Route::get('/admin/quotes', [AdminController::class, 'quotes'])->name('admin.quotes');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/my-quotes', [UserController::class, 'index'])->name('user.quotes.index');
    Route::get('/my-quotes/{id}', [UserController::class, 'show'])->name('user.quotes.show');
    Route::post('/my-quotes/{id}/accept', [UserController::class, 'accept'])->name('user.quotes.accept');

});