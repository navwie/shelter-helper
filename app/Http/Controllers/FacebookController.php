<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    /**
     *Create a new controller instance
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     *Create a new controller instance
     */
    public function handleFacebookCallback()
    {
        try {
            UserService::facebookSignUp();
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }
}
