<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return env('APP_NAME');
})->name('api.home');
Route::post('/tokens/create', [AuthController::class, 'createToken']);

// Protected routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/users/me', function (Request $request) {
        return $request->user();
    })->name('users.me');

    Route::apiResource('todos', TodoController::class);
});
