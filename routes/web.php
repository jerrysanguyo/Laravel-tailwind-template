<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function() {
    return view('auth.login');
});

Route::get('/register', function() {
    return view('auth.register');
});

Route::get('/table', function() {
    return view('table.index');
})->name('table');
