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
    public static function profile($id)
    {
        $user = DB::table("User")
            ->where('id', $id)
            ->first();

        if ($user->Role === 0){
            header("location: /userProfile");
        } else {
            header('location: /adminProfile'); // create admin page
        }
    }


    public static function mainPage($id)
    {
        $user = DB::table("User")
            ->where('id', $id)
            ->first();

        if ($user->Role === 0){
            header("location: /userPage");
        } else {
            header('location: /shelter');
        }
    }

    public static function signUp(SignUpRequest $request): bool
    {
        $userData = DB::table('User')
            ->where('Email', '=', $request['email'])
            ->where('Password', '=', $request['password'])
            ->first();
        if (is_object($userData)) {
            session()->put('userId', $userData->id);
            session()->put('userRole', $userData->Role);
            if ($userData->Role == 0) {
                header("location: /userPage");
            } else {
                $shelter = DB::table('Shelter')->where('ID_user', $userData->id)->first();
                if(is_object($shelter)){
                    header('location: /shelter');
                } else {
                    header('location: /createShelter');
                }
            }
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
        session()->pull('userId');
        session()->pull('userRole');
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
        return json_encode(User::find(session()->get("userId")));
    }

    public static function editUser(Request $request, $id)
    {

        $userData = DB::table('User')
            ->where('Email', '=', $request['email'])
            ->where('Password', '=', $request['password'])
            ->first();

        DB::table('User')
            ->where('id', $id)
            ->update([
                'Name' => $request['name'],
                'Surname' => $request['surname'],
                'Email' => $request['email'],
                'Phone' => $request['phone'],
                'Password' => $request['password'],
            ]);

        if ($userData->Role == 0) {
            header("location: /userProfile");
        } else {
            header("location: /adminProfile");
        }
    }
}
