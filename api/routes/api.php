<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;

Route::get('/', function (Request $request) {
    return response()->json(['message' => 'Welcome to api v 1.0!']);
});

Route::group(['middleware' => 'api'], function ($routes) {
    Route::post('register-user', [UserController::class,'userRegister']);
    Route::post('login-user', [UserController::class,'userLogin']);
    Route::get('user-profile', [UserController::class,'userProfile']);
    Route::post('login-google', [UserController::class,'loginGoogle']);

    Route::get('news-index', [NewsController::class,'index']);

    Route::group(['middleware' => 'auth:api'], function ($routes) {
        Route::get('news-show', [NewsController::class,'showGeneral']);
        Route::get('news-category/{category}', [NewsController::class,'newsWithCategories']);
        Route::get('news-suggestions', [NewsController::class,'suggestionsWithTitle']);
    });
});
