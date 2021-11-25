<?php

namespace App\Services;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class UserService
{
    /**
     * Sign in new user
     *
     * @param Request $request
     */
    public static function signIn(Request $request): bool
    {
        DB::table('User')->insert([
            'Name' => $request['name'],
            'Surname' => $request['surname'],
            'Email' => $request['email'],
            'Phone' => $request['phone'],
            'Password' => $request['password'],
            'Role'=> $request['role']
        ]);
        header("Location: /signUp");

        return true;
    }

    /**
     * Sign up user
     *
     * @param SignUpRequest $request
     */
    public static function signUp(Request $request): bool
    {
        $userData = DB::table('User')
            ->where('Email', '=', $request['email'])
            ->where('Password', '=', $request['password'])
            ->first();
        if (is_object($userData)) {
            session()->put('userId', $userData->id);
            header("Location: /userPage");

        } else {
            header('Location: /signUp');
        }

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
     * Return user that authorised now
     *
     * @return mixed
     */
    public static function getUserBySession()
    {
        return User::find(session()->get("userId"));
    }

    public static function editUser(Request $request, $id)
    {
        DB::table('User')
            ->where('id', $id)
            ->update([
                'Name' => $request['name'],
                'Surname' => $request['surname'],
                'Email' => $request['email'],
                'Phone' => $request['phone'],
                'Password' => $request['password'],
                'Role' => $request['role'],

            ]);

        header('Location: /userPage');
    }
}
