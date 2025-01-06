<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/redirect', [GoogleLoginController::class, 'getGoogleAuth']);
Route::get('/auth/callback', [GoogleLoginController::class, 'authGoogleCallback']);