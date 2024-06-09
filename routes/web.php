<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/auth/register', [RegisterController::class, 'index'])
    ->name('register');
Route::post('/auth/register', [RegisterController::class, 'store']);

Route::get('/auth/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/auth/login', [LoginController::class, 'store']);

Route::post('/auth/logout', [LogoutController::class, 'store'])
    ->name('logout');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])
    ->name('user.posts');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');
Route::post('/posts', [PostController::class, 'store'])->name('posts');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])
    ->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy']);
