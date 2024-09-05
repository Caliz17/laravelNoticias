<?php

use App\Http\Controllers\News;
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

// grupo de rutas para el controlador de noticias
Route::group(['prefix' => 'news'], function () {
    Route::get('/entertainment', [News::class, 'Entertainment'])
    ->name('entertainment.index');

    Route::get('/business', [News::class, 'Business'])
        ->name('business.index');

    Route::get('/health', [News::class, 'Health'])
        ->name('health.index');

    Route::get('/science', [News::class, 'Science'])
        ->name('science.index');

    Route::get('/sports', [News::class, 'Sports'])
        ->name('sports.index');

    Route::get('/technology', [News::class, 'Technology'])
        ->name('technology.index');

    Route::post('/news/detail', [News::class, 'detail'])
        ->name('news.detail');

});
