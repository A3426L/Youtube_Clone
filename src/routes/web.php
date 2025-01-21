<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\TestController;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/tests/home',[TestController::class,'home']);
Route::post('/tests/upload',[TestController::class,'upload']);

Route::get('/auth/redirect', [GoogleLoginController::class, 'getGoogleAuth']);
Route::get('/auth/callback', [GoogleLoginController::class, 'authGoogleCallback']);

