<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    // Handle login logic here
    return redirect()->route('dashboard');
})->name('login.post');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    // Handle registration logic here
    return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
})->name('register.post');
