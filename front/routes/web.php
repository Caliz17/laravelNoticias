<?php

use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', [User::class, 'handleGoogleCallback']);

Route::get('/login', [User::class, 'getLogin'])
    ->name('login.index');

Route::post('/access', [User::class, 'login'])
    ->name('login.login');

Route::get('/logout', [User::class, 'logout'])
    ->name('login.logout');
