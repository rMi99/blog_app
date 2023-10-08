<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [PostController::class, 'index'])->name('/');
Route::get('/{post}', [PostController::class, 'show'])->name('post');

// Route::delete('/home/destroy', [ PostController::class,'create'])->name('home.destroy');


Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
// Route::post('/comments/{post}', [CommentController::class,'store'])->name('comments.store');
// Route::delete('/comments/{comment}', [CommentController::class,'destroy'])->name('comments.destroy');

Route::post('/posts/create', [ PostController::class,'create'])->name('posts.create');

Route::get('/posts', [ PostController::class,'index'])->name('posts.index');
// Route::get('/posts', [ PostController::class,'index'])->name('home');


Route::post('/posts', [PostController::class,'store'])->name('posts.store');


Route::group(['middleware' => 'auth'], function () {

    Route::delete('/home', [PostController::class,'destroy'])->name('home.destroy');


});

