<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

// Home (beranda)
Route::get('/', function () {
    $posts = Post::with('user')->latest()->get();
    return view('home', compact('posts'));
})->name('home');

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
