<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Default
 */
Route::get('/', function () {
    return env('APP_NAME');
});

/**
 * Users
 */
Route::get('/users/me', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/**
 * Tokens
 */
Route::post('/tokens/create', [AuthController::class, 'createToken']);

/**
 * Todo routes
 */
Route::apiResource('todos', TodoController::class)->middleware('auth:sanctum');
