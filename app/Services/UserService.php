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
        $userData = DB::table('User')
            ->where('Email', '=', $request['email'])
            ->where('Password', '=', $request['password'])
            ->first();
        if (is_object($userData)) {
            session()->put('userId', $userData->id);
            session()->put('userRole', $userData->Role);
            if ($userData->Role === 0) {
                header("location: /UserPage");
            } else {
                $shelter = DB::table('Shelter')->where('ID_user', $userData->id)->first();
                if(is_object($shelter)){
                    header('location: /Shelter');
                } else {
                    header('location: /CreateShelter');
                }
            }
        }
        return true;
    }

    public static function profile($id)
    {
        $user = DB::table("User")
            ->where('id', $id)
            ->first();

        if ($user->Role === 0){
            header("location: /UserProfile");
        } else {
            header('location: /AdminProfile'); // create admin page
        }
    }

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
        session()->pull('userId');
        session()->pull('userRole');
        header("Location: /");
        return true;
    }


    public static function getUserBySession()
    {
        return json_encode(User::find(session()->get("userId")));
    }
}
