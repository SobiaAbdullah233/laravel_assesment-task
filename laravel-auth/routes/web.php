<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  Auth\AuthController,
  ProductController,
};

Route::get('/', [ProductController::class, 'index'])->name('dashboard')->middleware('auth');

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});
