<?php

use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [User::class, 'getLogin'])
    ->name('login.index');
