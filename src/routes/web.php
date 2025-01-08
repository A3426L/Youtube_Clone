<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\TestController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/upload',[TestController::class,'upload']);
Route::get('/auth/redirect', [GoogleLoginController::class, 'getGoogleAuth']);
Route::get('/auth/callback', [GoogleLoginController::class, 'authGoogleCallback']);

