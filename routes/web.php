<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

// Halaman Welcome (bebas akses)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Autentikasi (sudah otomatis ada route login/register/logout)
Auth::routes();

// Semua route yang butuh login
Route::middleware('auth')->group(function () {

    // Home (dengan data posts)
    Route::get('/home', function () {
        $posts = Post::with('user')->latest()->get();
        return view('home', compact('posts'));
    })->name('home');

    // Profile
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    // Create Post
    Route::get('/create', function () {
        return view('create');
    })->name('create');

    // Post routes
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::resource('posts', PostController::class);
    Route::post('posts/{post}/comment', [PostController::class, 'comment'])->name('posts.comment');
    Route::post('posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
});
