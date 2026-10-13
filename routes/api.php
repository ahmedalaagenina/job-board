<?php

// use App\Http\Controllers\CommentController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\TagController;
// use Illuminate\Support\Facades\Route;

// Route::post('/blog', [PostController::class, 'create']);
// Route::delete('/blog/{id}', [PostController::class, 'destroy']);

// Route::post('/comments', [CommentController::class, 'create']);

// Route::post('/tags', [TagController::class, 'create']);

use App\Http\Controllers\Api\v1\PostApiController;
use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function () {
    Route::apiResource('post', PostApiController::class);
});
