<?php

use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})
    ->name('home');

Route::get('/login', [User::class, 'getLogin'])
    ->name('login.index');

Route::post('/access', [User::class, 'login'])
    ->name('login.login');

Route::get('/logout', [User::class, 'logout'])
    ->name('login.logout');
