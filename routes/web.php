<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

// Home (beranda)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Profile (profil user)
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
Route::get('/create', function () {
    return view('create');
})->name('create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::resource('posts', PostController::class);
Route::post('posts/{post}/comment', [PostController::class, 'comment'])->name('posts.comment');
Route::post('posts/{post}/like', [PostController::class, 'like'])->name('posts.like');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
