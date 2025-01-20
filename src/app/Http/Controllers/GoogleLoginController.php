<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function getGoogleAuth()
    {
        return Socialite::driver('google')
            ->redirect();
    }

    public function authGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::firstOrCreate([
            'email' => $googleUser->email
        ], [
            'email_verified_at' => now(),
            'name' => $googleUser->name,
            'password' => bcrypt('password'),
            'avatar_url' => $googleUser->avatar,
            'google_id' => $googleUser->getId()
        ]);
        Auth::login($user, true);
        return redirect('/tests/home');
    }
}
