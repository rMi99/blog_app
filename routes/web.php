<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('/');


Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
// Route::post('/comments/{post}', [CommentController::class,'store'])->name('comments.store');
// Route::delete('/comments/{comment}', [CommentController::class,'destroy'])->name('comments.destroy');

Route::post('/posts/create', [ PostController::class,'create'])->name('posts.create');

Route::get('/posts', [ PostController::class,'index'])->name('posts.index');
// Route::get('/posts', [ PostController::class,'index'])->name('home');


Route::post('/posts', [PostController::class,'store'])->name('posts.store');


