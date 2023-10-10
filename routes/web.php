<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Auth::routes();

// Route::get('/home', [HomeController::class, 'userPosts'])->name('home');
// Route::get('/', [PostController::class, 'index'])->name('/');
// Route::get('/{post}', [PostController::class, 'show'])->name('post');
// Route::put('/posts/{post}/update', [PostController::class,'update'])->name('posts.update');
// Route::delete('/posts/{post}/destroy', [PostController::class,'destroy'])->name('posts.destroy');
// Route::post('/posts', [PostController::class,'store'])->name('posts.store');
// Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
// Route::post('/posts/create', [ PostController::class,'create'])->name('posts.create');

// Route::post('/comments/store/{post}', [CommentController::class,'store'])->name('comments.store');
// Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');


// Route::get('/posts', [ PostController::class,'index'])->name('posts.index');
Route::get('/home', [HomeController::class, 'userPosts'])->name('home');

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/search', [PostController::class, 'search'])->name('posts.search');
    Route::post('/', [PostController::class, 'store'])->name('posts.store');
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::put('/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/{post}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/create', [PostController::class, 'create'])->name('posts.create');
});

Route::post('/comments/store/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::get('/{post}', [PostController::class, 'show'])->name('post');
Route::get('/', [PostController::class, 'index'])->name('/');


Route::get('auth/google', [ GoogleAuthController::class,'redirectToGoogle'])->name('google-auth');
Route::get('auth/google/callback', [ GoogleAuthController::class,'handleGoogleCallback']);





Route::group(['middleware' => 'auth'], function () {



});

