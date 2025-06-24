<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/login', function () {
    echo 'Login';
    //return view('auth.login'); // Ensure this view exists
})->name('login'); */
