<?php

namespace App\Services;

use App\Models\User;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\DB;

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
    }
}
