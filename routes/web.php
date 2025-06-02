<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/my-quotes', [UserController::class, 'index'])->name('user.quotes.index');
    Route::get('/my-quotes/{id}', [UserController::class, 'show'])->name('user.quotes.show');
    Route::post('/my-quotes/{id}/accept', [UserController::class, 'accept'])->name('user.quotes.accept');
});