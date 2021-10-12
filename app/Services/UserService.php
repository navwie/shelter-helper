<?php

namespace App\Services;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

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

}
