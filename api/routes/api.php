<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function (Request $request) {
    return response()->json(['message' => 'Welcome to api v 1.0!']);
});

Route::group(['middleware' => 'api'], function ($routes) {
    Route::post('register-user', [UserController::class,'userRegister']);
});
