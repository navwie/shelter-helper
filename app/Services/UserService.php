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
    public static function signIn(SignInRequest $request): void
    {
        DB::table('users')->insert([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);
        header("Location: /");
    }

    public static function signUp(SignUpRequest $request):void
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
    }

    public static function isAuth(): bool
    {
        if(session()->get('name') !== null) {
            return true;
        } else {
            return false;
        }
    }

    public static function logOut(): void
    {
        session()->pull('id');
        session()->pull('name');
        session()->pull('surname');
        session()->pull('activeProject');
        header("Location: /");
    }

    public static function googleSignUp(): void
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
    }

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

    public static function getUserBySession()
    {
        return User::find(session()->get("userId"));
    }
}
