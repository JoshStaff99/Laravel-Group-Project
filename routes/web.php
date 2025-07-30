<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteController;

// Redirect root URL '/' to '/login' to avoid 404
Route::get('/', function () {
    return redirect('/login');
});

// Show login form
Route::get('/login', function () {
    return view('login');
})->name('login.form');

// Handle login submission
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Dashboard route (admin or user)
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return app(AdminController::class)->dashboard();
    }

    return app(UserController::class)->dashboard(); // user dashboard logic
})->middleware('auth')->name('dashboard');

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login.form');
})->name('logout');

// Protected product and quote routes
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('quotes', QuoteController::class);
});

// Admin-only routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/quotes', [AdminController::class, 'quotes'])->name('admin.quotes');
});

// User routes
Route::middleware('auth')->group(function () {
    Route::get('/my-quotes', [UserController::class, 'index'])->name('user.quotes.index');
    Route::get('/my-quotes/{id}', [UserController::class, 'show'])->name('user.quotes.show');
    Route::get('/my-quotes/{id}/accept', [UserController::class, 'accept'])->name('user.quotes.accept'); // using GET for simplicity
});