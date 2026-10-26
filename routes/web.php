<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// ## public routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', IndexController::class);
Route::get('/contact', ContactController::class);

Route::get('/job', [JobController::class, 'index']);

// ## Protected routes
Route::middleware('auth')->group(function () {
    // Admin, Editor
    Route::middleware('role:editor,admin')->group(function () {
        Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');
        Route::post('/blog', [PostController::class, 'store'])->name('blog.store');
        Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('blog.edit')->can('update', 'post');
        Route::put('/blog/{post}', [PostController::class, 'update'])->name('blog.update')->can('update', 'post');
    });

    // Admin
    Route::middleware('role:admin')->group(function () {
        Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('blog.destroy');
    });

    // Admin, Editor, viewer (any one)
    Route::middleware('role:viewer,editor,admin')->group(function () {
        Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
        Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');
        Route::resource('comments', CommentController::class);
    });

    Route::post('/blog/{post}/comments', [CommentController::class, 'store'])
        ->name('blog.comments.store');

    Route::resource('tags', TagController::class);
});

Route::middleware('onlyMe')->group(
    function () {
        Route::get('/about', AboutController::class);
    }
);
