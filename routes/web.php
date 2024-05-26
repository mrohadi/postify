<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/auth/register', [RegisterController::class, 'index'])
    ->name('register');
Route::post('/auth/register', [RegisterController::class, 'store']);

Route::get('/auth/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/auth/login', [LoginController::class, 'store']);

Route::post('/auth/logout', [LogoutController::class, 'store'])
    ->name('logout');

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');
