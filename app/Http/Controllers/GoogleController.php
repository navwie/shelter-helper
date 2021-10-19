<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     *Create a new controller instance
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     *Create a new controller instance
     */
    public function handleGoogleCallback()
    {
        try {
            UserService::googleSignUp();
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }
}
