<?php

namespace App\Services;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class UserService
{
    /**
     * Sign in new user
     *
     * @param SignInRequest $request
     */
    public static function signIn(SignInRequest $request): bool
    {
        DB::table('users')->insert([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);
        header("Location: /");

        return true;
    }

    /**
     * Sign up user
     *
     * @param SignUpRequest $request
     */
    public static function signUp(SignUpRequest $request): bool
    {
        $userData = DB::table('users')
            ->where('email', '=', $request['email'])
            ->where('password', '=', $request['password'])
            ->first();
        if (is_object($userData)) {
            session()->put('userId', $userData->id);
            session()->put('name', $userData->name);
            session()->put('surname', $userData->surname);
        }
        header("Location: /");

        return true;
    }

    /**
     * Return is user authorize or not
     *
     * @return bool
     */
    public static function isAuth(): bool
    {
        if(session()->get('userId') !== null) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Log out user
     */
    public static function logOut(): bool
    {
        session()->pull('id');
        session()->pull('name');
        session()->pull('surname');
        session()->pull('activeProject');
        header("Location: /");
        return true;
    }

    /**
     * Sign up with Google service
     */
    public static function googleSignUp(): bool
    {
        $googleUser = Socialite::driver('google')->user();

        $user = DB::table('users')
            ->where("google_id", "=", $googleUser->getId())
            ->first();
        if($user === null) {
            $id = DB::table('users')->insertGetId([
                'name' => $googleUser['given_name'],
                'surname' => $googleUser["family_name"],
                'email' => $googleUser['email'],
                'google_id' => $googleUser->getId()
            ]);
            session()->put('userId', $id);
        } else {
            session()->put('userId', $user->id);
        }

        session()->put('name', $googleUser['given_name']);
        session()->put('surname', $googleUser['family_name']);
        header("Location: /");
        return true;
    }

    /**
     * Sign up with Facebook service
     */
    public static function facebookSignUp(): void
    {
        $facebookUser = Socialite::driver('facebook')->user();
        $fullName = explode(" ", $facebookUser['name']);
        $user = DB::table('users')
            ->where("facebook_id", "=", $facebookUser->getId())
            ->first();

        if($user === null) {
            $id = DB::table('users')->insertGetId([
                'name' => $fullName[0],
                'surname' => $fullName[1],
                'email' => $facebookUser['email'],
                'facebook_id' => $facebookUser->getId()
            ]);
            session()->put('userId', $id);
        } else {
            session()->put('userId', $user->id);
        }

        session()->put('name', $fullName[0]);
        session()->put('surname', $fullName[1]);
        header("Location: /");
    }

    /**
     * Return user that authorised now
     *
     * @return mixed
     */
    public static function getUserBySession()
    {
        return User::find(session()->get("userId"));
    }
}
