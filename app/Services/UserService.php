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
        session()->pull('name');
        session()->pull('surname');
        header("Location: /");
    }

    public static function googleSignUp(): void
    {
        $user = Socialite::driver('google')->user();

        if(DB::table('users')
            ->where("google_id", "=", $user->getId())
            ->first() === null
        ) {
            DB::table('users')->insert([
                'name' => $user['given_name'],
                'surname' => $user["family_name"],
                'email' => $user['email'],
                'google_id' => $user->getId()
            ]);
        }


        session()->put('name', $user['given_name']);
        session()->put('surname', $user['family_name']);
        header("Location: /");
    }

    public static function facebookSignUp(): void
    {
        $user = Socialite::driver('facebook')->user();

        $fullName = explode(" ", $user['name']);
        if(DB::table('users')
                ->where("facebook_id", "=", $user->getId())
                ->first() === null
        ) {
            DB::table('users')->insert([
                'name' => $fullName[0],
                'surname' => $fullName[1],
                'email' => $user['email'],
                'facebook_id' => $user->getId()
            ]);
        }


        session()->put('name', $fullName[0]);
        session()->put('surname', $fullName[1]);
        header("Location: /");
    }
}
