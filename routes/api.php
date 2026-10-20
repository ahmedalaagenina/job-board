<?php

// use App\Http\Controllers\CommentController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\TagController;
// use Illuminate\Support\Facades\Route;

// Route::post('/blog', [PostController::class, 'create']);
// Route::delete('/blog/{id}', [PostController::class, 'destroy']);

// Route::post('/comments', [CommentController::class, 'create']);

// Route::post('/tags', [TagController::class, 'create']);

use App\Http\Controllers\Api\v1\AuthApiController;
use App\Http\Controllers\Api\v1\PostApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthApiController::class, 'login']);
        Route::middleware('auth:api')->group(function () {
            Route::get('refresh_token', [AuthApiController::class, 'refresh']);
            Route::get('me', [AuthApiController::class, 'me']);
            Route::post('logout', [AuthApiController::class, 'logout']);
        });
    });
    Route::apiResource('post', PostApiController::class)->middleware('auth:api');

});
